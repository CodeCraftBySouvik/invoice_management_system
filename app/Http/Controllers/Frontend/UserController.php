<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

// use Stripe\Stripe;
// use Stripe\PaymentIntent;
// use Stripe\Checkout\Session;

class UserController extends Controller
{
    public function login() {
        $page = [
            'term' => 'Login'
        ];

        return view('frontend.user.login', compact('page'));
    }

    public function loginSubmit(Request $request) {
        if($request->input('form-name') == 'withEmail'){
            $request->validate([
                'email' => 'required|email',
                'password-1' => 'required|digits:6',
            ], [
                'password-1.required' => 'Please enter your password',
                'password-1.digits' => 'The password must be at least 6 characters',
            ]);
        }
        if($request->input('form-name') == 'withMobile'){
            $request->validate([
                'mobile' => 'required|numeric|digits:10',
                'password-2' => 'required|digits:6',
            ], [
                'password-2.required' => 'Please enter your password',
                'password-2.digits' => 'The password must be at least 6 characters',
            ]);
        }

        $data = $request->all();

        // $exist_user = Controller::getModel('User')::where([
        //     'email' => $request->input('email')
        // ])->whereOr([
        //     'mobile' => $request->input('mobile')
        // ])->first();

        // if(!$exist_user){
        //     $user = Controller::newModel('User');
        //     $user->fname = $request->input('name');
        //     $user->mobile = $request->input('mobile');
        //     $user->email = $request->input('email');
        //     $user->password = Hash::make($request->input('password'));
        //     $user->role = $request->input('user_role');

        //     if($user->save()){
        //         $user_details = Controller::newModel('UserDetails');
        //         $user_details->user_id = $user->id;
        //         $user_details->user_unique_id = Controller::generateUserCode($user->id, $request->input('user_type'));
        //         $user_details->user_type = $request->input('user_type');

        //         if($user_details->save()){
        //             $user_meta_key = $request->input('user_meta_key');
        //             $user_meta_value = $request->input('user_meta_value');

        //             for($i=0; $i<count($user_meta_key); $i++){
        //                 if($user_meta_value[$i]){
        //                     // $user_info = User_meta::where('meta_key', $user_meta_key[$i])->where('user_id', $vendor->id)->first();
        //                     $user_info = Controller::newModel('UserMeta');;
        //                     $user_info->user_id = $user->id;
        //                     $user_info->meta_key = $user_meta_key[$i];
        //                     $user_info->meta_value = $user_meta_value[$i];
        //                     $user_info->save();
        //                 }
        //             }
        //             $credentials = array(
        //                 'mobile' => $request->input('mobile'),
        //                 'password'  => $request->input('password'),
        //             );

        //             if(Auth::guard('user')->attempt($credentials )) {
        //                 return redirect()->intended('/');
        //             }
        //         }
        //     }
        //     else{
        //         return redirect()->back()->with('error','Something went wrong!');
        //     }
        // }
        // else{
        //     return redirect()->back()->with('error','User already exist');
        // }

        // return redirect()->back()->with('error','User already exist');
        return redirect()->to('/otp');
    }

    public function register() {
        $page = [
            'term' => 'Register'
        ];

        return view('frontend.user.register', compact('page'));
    }

    public function registerSubmit(Request $request) {
        if($request->input('form-name') == 'withEmail'){
            $request->validate([
                'email' => 'required|email',
                'password-1' => 'required|digits:6',
            ], [
                'password-1.required' => 'Please enter your password',
                'password-1.digits' => 'The password must be at least 6 characters',
            ]);
        }
        if($request->input('form-name') == 'withMobile'){
            $request->validate([
                'mobile' => 'required|numeric|digits:10',
                'password-2' => 'required|digits:6',
            ], [
                'password-2.required' => 'Please enter your password',
                'password-2.digits' => 'The password must be at least 6 characters',
            ]);
        }

        $data = $request->all();

        // $exist_user = Controller::getModel('User')::where([
        //     'email' => $request->input('email')
        // ])->whereOr([
        //     'mobile' => $request->input('mobile')
        // ])->first();

        // if(!$exist_user){
        //     $user = Controller::newModel('User');
        //     $user->fname = $request->input('name');
        //     $user->mobile = $request->input('mobile');
        //     $user->email = $request->input('email');
        //     $user->password = Hash::make($request->input('password'));
        //     $user->role = $request->input('user_role');

        //     if($user->save()){
        //         $user_details = Controller::newModel('UserDetails');
        //         $user_details->user_id = $user->id;
        //         $user_details->user_unique_id = Controller::generateUserCode($user->id, $request->input('user_type'));
        //         $user_details->user_type = $request->input('user_type');

        //         if($user_details->save()){
        //             $user_meta_key = $request->input('user_meta_key');
        //             $user_meta_value = $request->input('user_meta_value');

        //             for($i=0; $i<count($user_meta_key); $i++){
        //                 if($user_meta_value[$i]){
        //                     // $user_info = User_meta::where('meta_key', $user_meta_key[$i])->where('user_id', $vendor->id)->first();
        //                     $user_info = Controller::newModel('UserMeta');;
        //                     $user_info->user_id = $user->id;
        //                     $user_info->meta_key = $user_meta_key[$i];
        //                     $user_info->meta_value = $user_meta_value[$i];
        //                     $user_info->save();
        //                 }
        //             }
        //             $credentials = array(
        //                 'mobile' => $request->input('mobile'),
        //                 'password'  => $request->input('password'),
        //             );

        //             if(Auth::guard('user')->attempt($credentials )) {
        //                 return redirect()->intended('/');
        //             }
        //         }
        //     }
        //     else{
        //         return redirect()->back()->with('error','Something went wrong!');
        //     }
        // }
        // else{
        //     return redirect()->back()->with('error','User already exist');
        // }

        // return redirect()->back()->with('error','User already exist');
        return redirect()->to('/otp');
    }

    public function otp() {
        $page = [
            'term' => 'OTP'
        ];

        return view('frontend.user.otp', compact('page'));
    }

    public function otpSubmit(Request $request) {
        $request->validate([
            'otp' => 'required|numeric|digits:6'
        ], [
        ]);

        $data = $request->all();

        // $exist_user = Controller::getModel('User')::where([
        //     'email' => $request->input('email')
        // ])->whereOr([
        //     'mobile' => $request->input('mobile')
        // ])->first();

        // if(!$exist_user){
        //     $user = Controller::newModel('User');
        //     $user->fname = $request->input('name');
        //     $user->mobile = $request->input('mobile');
        //     $user->email = $request->input('email');
        //     $user->password = Hash::make($request->input('password'));
        //     $user->role = $request->input('user_role');

        //     if($user->save()){
        //         $user_details = Controller::newModel('UserDetails');
        //         $user_details->user_id = $user->id;
        //         $user_details->user_unique_id = Controller::generateUserCode($user->id, $request->input('user_type'));
        //         $user_details->user_type = $request->input('user_type');

        //         if($user_details->save()){
        //             $user_meta_key = $request->input('user_meta_key');
        //             $user_meta_value = $request->input('user_meta_value');

        //             for($i=0; $i<count($user_meta_key); $i++){
        //                 if($user_meta_value[$i]){
        //                     // $user_info = User_meta::where('meta_key', $user_meta_key[$i])->where('user_id', $vendor->id)->first();
        //                     $user_info = Controller::newModel('UserMeta');;
        //                     $user_info->user_id = $user->id;
        //                     $user_info->meta_key = $user_meta_key[$i];
        //                     $user_info->meta_value = $user_meta_value[$i];
        //                     $user_info->save();
        //                 }
        //             }
        //             $credentials = array(
        //                 'mobile' => $request->input('mobile'),
        //                 'password'  => $request->input('password'),
        //             );

        //             if(Auth::guard('user')->attempt($credentials )) {
        //                 return redirect()->intended('/');
        //             }
        //         }
        //     }
        //     else{
        //         return redirect()->back()->with('error','Something went wrong!');
        //     }
        // }
        // else{
        //     return redirect()->back()->with('error','User already exist');
        // }

        // return redirect()->back()->with('error','User already exist');
        return redirect()->to('/setup');
    }


    public function self() {
        return redirect()->back();
    }
}
