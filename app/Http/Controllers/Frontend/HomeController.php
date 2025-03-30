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

// use Stripe\Stripe;
// use Stripe\PaymentIntent;
// use Stripe\Checkout\Session;

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
        dd($request->all());
        $request->validate([
            'amount' => 'required|numeric',
            'package_id' => 'required|exists:packages,id',
            'billing_cycle' => 'required|in:monthly,yearly',
            'card_number' => 'required|string',
            'expiry_month' => 'required|numeric|between:1,12',
            'expiry_year' => 'required|numeric|min:' . date('Y'),
            'cvc' => 'required|numeric|digits_between:3,4',
        ]);
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        try {
              // Create payment method
              $paymentMethod = PaymentMethod::create([
                'type' => 'card',
                'card' => [
                    'number' => str_replace(' ', '', $request->card_number),
                    'exp_month' => $request->expiry_month,
                    'exp_year' => $request->expiry_year,
                    'cvc' => $request->cvc,
                ],
            ]);
        }catch(error){

        }
    }

    public function checkoutSuccess() {
        $page = [
            'term' => 'Checkout Success'
        ];
        

        return view('frontend.checkout-success', compact('page'));
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
    
            return redirect()->route('free-trial-dashboard')->with('success', 'Company setup completed!');
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
    
}
