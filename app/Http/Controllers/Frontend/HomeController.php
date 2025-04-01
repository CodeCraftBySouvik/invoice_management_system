<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserCompaniesData;
use App\Models\Package;
use App\Models\Transaction;

use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Checkout\Session;

class HomeController extends Controller
{
    public function index() {
        $page = [
            'term' => 'Homepage'
        ];

        return view('frontend.index', compact('page'));
    }

    public function pricing() {
        $page = [
            'term' => 'Pricing'
        ];
        $monthly_package = Package::whereNotNull('monthly_price')->where('monthly_price','>=',0)->get();
        $yearly_package  = Package::whereNotNull('yearly_price')->where('yearly_price','>=',0)->get();
        
        return view('frontend.pricing', compact('page','monthly_package','yearly_package'));
    }
    public function package_customize() {
        $page = [
            'term' => 'package-customize'
        ];

        return view('frontend.customize-package', compact('page'));
    }
    public function package_customize_store(Request $request) {
        // dd($request->all());

    $request->validate([
        'name' => 'required|string|max:255',
        'monthly_price' => 'nullable|numeric',
        'yearly_price' => 'nullable|numeric',
        'description' => 'required|string',
        'currency' => 'nullable|string|max:20',
        'button_text' => 'required|string|max:25',
    ]);

      // Ensure that null values are converted to 0.00 if left empty
      $monthlyPrice = $request->monthly_price !== null ? $request->monthly_price : 0.00;
      $yearlyPrice = $request->yearly_price !== null ? $request->yearly_price : 0.00;
    // Store the package in the database
    Package::create([
        'name' => $request->name,
        'monthly_price' => $monthlyPrice,
        'yearly_price' => $yearlyPrice,
        'description' => $request->description,
        'currency' => $request->currency ?? 'AED', // Default to AED if empty
        'button_text' => $request->button_text, // Default text
    ]);

    return redirect()->route('pricing')->with('success', 'Custom package saved successfully!');
      
    }

    public function CreateAccount() {
        $page = [
            'term' => 'Account'
        ];

        return view('frontend.create-account', compact('page'));
    }

    public function start_checkout(Request $request) {
       $user_id = Auth::user()->id;

       $data = new Transaction();

       $data->user_id = $user_id;
       $data->package_id = $request->package_id;
       $data->attempt_package_type = $request->package_type;
       $data->attempt_package_amount = $request->package_amount;
       $data->attempt_date_time = now();
       $data->save();
        return response()->json(['status'=>'success','url'=>route('checkout')]);
    }
    public function checkout(Request $request) {
        $data  = Transaction::where('user_id',Auth::user()->id)->orderBy('id','DESC')->first();
        $package = Package::find($data->package_id);
        $vat = env('VAT_AMOUNT');
        $page = [
            'term' => 'Checkout',
            'vat'=> $vat,
            'package'=> $package,
            'data'=> $data,
        ];

        return view('frontend.checkout', compact('page'));
    }

    public function processCardPayment(Request $request){
        // dd($request->all());
        $request->validate([
            'amount' => 'required|numeric',
            'package_id' => 'required|exists:packages,id',
            'billing_cycle' => 'required|in:monthly,yearly',
            'card_number' => 'required|string',
            'expiry_month' => 'required|numeric|between:1,12',
            'expiry_year' => 'required|numeric|min:' . date('Y'),
            'security_code' => 'required|numeric|digits_between:3,4',
        ]);
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        try {
              // Create payment method
              $paymentMethod = \Stripe\PaymentMethod::create([
                'type' => 'card',
                'card' => [
                    'number' => str_replace(' ', '', $request->card_number),
                    'exp_month' => $request->expiry_month,
                    'exp_year' => $request->expiry_year,
                    'cvc' => $request->security_code,
                ],
            ]);
            // Create payment intent
            $paymentIntent = PaymentIntent::create([
                'amount' => $request->amount,
                'currency' => 'aed',
                'payment_method' => $paymentMethod->id,
                'confirm' => true,
                'metadata' => [
                    'user_id' => Auth::id(),
                    'package_id' => $request->package_id,
                    'billing_cycle' => $request->billing_cycle,
                ],
                'description' => 'Subscription payment for package #' . $request->package_id,
               
            ]); 
            // Update transaction
            $transaction = Transaction::where('user_id', Auth::id())
                ->where('package_id', $request->package_id)
                ->whereNull('purchase_date_time')
                ->latest()
                ->first();

                if ($paymentIntent->status === 'succeeded') {
                    $transaction->update([
                        'purchase_package_type' => $request->billing_cycle,
                        'purchase_package_amount' => $request->amount / 100,
                        'purchase_date_time' => now(),
                        'status' => 'completed',
                        'stripe_payment_intent_id' => $paymentIntent->id,
                    ]);
    
                    return response()->json([
                        'success' => true,
                        'transaction_id' => $transaction->id,
                        'redirect_url' => route('checkout-success', ['transaction_id' => $transaction->id])
                    ]);
                } else {
                    return response()->json([
                        'error' => 'Payment processing failed. Please try again.'
                    ], 400);
                }


            } catch (\Stripe\Exception\CardException $e) {
                return response()->json([
                    'error' => $e->getError()->message
                ], 400);
            } catch (\Exception $e) {
                return response()->json([
                    'error' => 'Payment processing failed. Please try again.'
                ], 500);
            }
    }

    public function processStripePayment(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'package_id' => 'required|exists:packages,id',
            'billing_cycle' => 'required|in:monthly,yearly',
            'payment_method_id' => 'required|string',
        ]);

        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        try {
            $transaction = Transaction::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'package_id' => $request->package_id,
                    'purchase_date_time' => null
                ],
                [
                    'purchase_package_type' => $request->billing_cycle,
                    'purchase_package_amount' => $request->amount / 100,
                    'status' => 'pending'
                ]
            );
            // Create payment intent
            $paymentIntent = PaymentIntent::create([
                'amount' => $request->amount,
                'currency' => 'aed',
                'payment_method' => $request->payment_method_id,
                // 'confirmation_method' => 'manual',
                'confirm' => true,
                'metadata' => [
                    'user_id' => Auth::id(),
                    'package_id' => $request->package_id,
                    'billing_cycle' => $request->billing_cycle,
                ],
                'return_url' => $request->return_url ?? route('checkout-success', ['transaction_id' => $transaction->id]),
                'automatic_payment_methods' => [
                    'enabled' => true,
                    'allow_redirects' => 'never' // Disable redirect-based payment methods
                ],
                'description' => 'Subscription payment for package #' . $request->package_id,
                'use_stripe_sdk' => true,

            ]);

            // Update transaction
            // $transaction = Transaction::where('user_id', Auth::id())
            //     ->where('package_id', $request->package_id)
            //     ->whereNull('purchase_date_time')
            //     ->latest()
            //     ->first();

            $transaction->update([
                'stripe_payment_intent_id' => $paymentIntent->id,
            ]);

            switch ($paymentIntent->status) {
                case 'requires_action':
                    return response()->json([
                        'requires_action' => true,
                        'client_secret' => $paymentIntent->client_secret,
                        'transaction_id' => $transaction->id
                    ]);
                    
                case 'succeeded':
                    $transaction->update([
                        'purchase_date_time' => now(),
                        'status' => 'completed',
                    ]);
                    
                    return response()->json([
                        'success' => true,
                        'transaction_id' => $transaction->id,
                        'redirect_url' => route('checkout-success', ['transaction_id' => $transaction->id])
                    ]);
                    
                default:
                    return response()->json([
                        'error' => 'Payment processing failed. Status: ' . $paymentIntent->status
                    ], 400);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function checkoutSuccess(Request $request)
    {
        $transaction = Transaction::with('package')
            ->where('id', $request->transaction_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('frontend.checkout-success', [
            'transaction' => $transaction,
            'package' => $transaction->package,
        ]);
    }

    public function setup() {
        $page = [
            'term' => 'Setup'
        ];
        
        return view('frontend.setup', compact('page'));
    }
    public function setupSubmit(Request $request) {
        $request->validate([
            'company_name' => 'required|string',
            'address' => 'required|string',
            'area' => 'required|string',
            'emirates' => 'required',
            'phone_number' => 'required|digits:10|unique:user_companies_data,phone_number',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Allow only images
        ]);
        
        try {
            // Start transaction
            DB::beginTransaction();
    
            $data = new UserCompaniesData();
            $data->user_id = Auth::id();
            $data->company_name = $request->company_name;
            $data->address = $request->address;
            $data->area = $request->area;
            $data->emirates = $request->emirates;
            $data->phone_number = $request->phone_number;
    
            // Handle file upload
            if ($request->hasFile('company_logo')) {
                $file = $request->file('company_logo');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('uploads/company_logos', $filename, 'public');
                $data->logo = $path; // Store the path in DB
            }
    
            $data->save();
            DB::commit(); // Commit transaction

            // Check if user has any completed transactions
            $hasPaidSubscription = Transaction::where('user_id', Auth::id())
            ->where('status', 'completed')
            ->exists();


    
             // Redirect based on payment status
            if ($hasPaidSubscription) {
                return redirect()->route('admin.dashboard')->with('success', 'Company setup completed!');
            } else {
                return redirect()->route('free-trial-dashboard')->with('success', 'Company setup completed!');
            }

        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack(); // Rollback transaction in case of failure
    
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function FreeTrialdashboard(){
        $page = [
            'term' => 'Free Trial Dashboard'
        ];
        // fetch the logged in user's company data
        $userCompanyData = UserCompaniesData::where('user_id', Auth::id())->first();
        return view('admin.free.dashboard',compact('page','userCompanyData'));
    }

    public function UpgradeDashboard(){
        $page = [
            'term' => 'Upgrade Dashboard'
        ];

        return view('admin.dashboard',compact('page'));
    }
    
}
