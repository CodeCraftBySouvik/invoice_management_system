<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

// use Stripe\Stripe;
// use Stripe\PaymentIntent;
// use Stripe\Checkout\Session;

class DashboardController extends Controller
{
    public function index() {
        $page = [
            'term' => 'Homepage'
        ];

        return view('admin.dashboard', compact('page'));
    }

    // public function pricing() {
    //     $page = [
    //         'term' => 'Pricing'
    //     ];

    //     return view('frontend.pricing', compact('page'));
    // }

    // public function CreateAccount() {
    //     $page = [
    //         'term' => 'Account'
    //     ];

    //     return view('frontend.create-account', compact('page'));
    // }

    // public function checkout() {
    //     $page = [
    //         'term' => 'Checkout'
    //     ];

    //     return view('frontend.checkout', compact('page'));
    // }

    // public function checkoutSuccess() {
    //     $page = [
    //         'term' => 'Checkout Success'
    //     ];

    //     return view('frontend.checkout-success', compact('page'));
    // }

    // public function setup() {
    //     $page = [
    //         'term' => 'Setup'
    //     ];

    //     return view('frontend.setup', compact('page'));
    // }
}
