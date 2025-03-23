<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserCompaniesData;

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

        return view('frontend.pricing', compact('page'));
    }

    public function CreateAccount() {
        $page = [
            'term' => 'Account'
        ];

        return view('frontend.create-account', compact('page'));
    }

    public function checkout() {
        $page = [
            'term' => 'Checkout'
        ];

        return view('frontend.checkout', compact('page'));
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
