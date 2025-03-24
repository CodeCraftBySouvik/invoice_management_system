<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendRegistrationOTP;
use App\Services\TwilioService;

// use Stripe\Stripe;
// use Stripe\PaymentIntent;
// use Stripe\Checkout\Session;

class UserController extends Controller
{
    // public function login() {
    //     $page = [
    //         'term' => 'Login'
    //     ];

    //     return view('frontend.user.login', compact('page'));
    // }

    // public function loginSubmit(Request $request) {
    //     if($request->input('form-name') == 'withEmail'){
    //         $request->validate([
    //             'email' => 'required|email',
    //             'password-1' => 'required|digits:6',
    //         ], [
    //             'password-1.required' => 'Please enter your password',
    //             'password-1.digits' => 'The password must be at least 6 characters',
    //         ]);
    //     }
    //     if($request->input('form-name') == 'withMobile'){
    //         $request->validate([
    //             'mobile' => 'required|numeric|digits:10',
    //             'password-2' => 'required|digits:6',
    //         ], [
    //             'password-2.required' => 'Please enter your password',
    //             'password-2.digits' => 'The password must be at least 6 characters',
    //         ]);
    //     }

    //     $data = $request->all();

    //     // $exist_user = Controller::getModel('User')::where([
    //     //     'email' => $request->input('email')
    //     // ])->whereOr([
    //     //     'mobile' => $request->input('mobile')
    //     // ])->first();

    //     // if(!$exist_user){
    //     //     $user = Controller::newModel('User');
    //     //     $user->fname = $request->input('name');
    //     //     $user->mobile = $request->input('mobile');
    //     //     $user->email = $request->input('email');
    //     //     $user->password = Hash::make($request->input('password'));
    //     //     $user->role = $request->input('user_role');

    //     //     if($user->save()){
    //     //         $user_details = Controller::newModel('UserDetails');
    //     //         $user_details->user_id = $user->id;
    //     //         $user_details->user_unique_id = Controller::generateUserCode($user->id, $request->input('user_type'));
    //     //         $user_details->user_type = $request->input('user_type');

    //     //         if($user_details->save()){
    //     //             $user_meta_key = $request->input('user_meta_key');
    //     //             $user_meta_value = $request->input('user_meta_value');

    //     //             for($i=0; $i<count($user_meta_key); $i++){
    //     //                 if($user_meta_value[$i]){
    //     //                     // $user_info = User_meta::where('meta_key', $user_meta_key[$i])->where('user_id', $vendor->id)->first();
    //     //                     $user_info = Controller::newModel('UserMeta');;
    //     //                     $user_info->user_id = $user->id;
    //     //                     $user_info->meta_key = $user_meta_key[$i];
    //     //                     $user_info->meta_value = $user_meta_value[$i];
    //     //                     $user_info->save();
    //     //                 }
    //     //             }
    //     //             $credentials = array(
    //     //                 'mobile' => $request->input('mobile'),
    //     //                 'password'  => $request->input('password'),
    //     //             );

    //     //             if(Auth::guard('user')->attempt($credentials )) {
    //     //                 return redirect()->intended('/');
    //     //             }
    //     //         }
    //     //     }
    //     //     else{
    //     //         return redirect()->back()->with('error','Something went wrong!');
    //     //     }
    //     // }
    //     // else{
    //     //     return redirect()->back()->with('error','User already exist');
    //     // }

    //     // return redirect()->back()->with('error','User already exist');
    //     return redirect()->to('/otp');
    // }

    // public function register() {
    //     $page = [
    //         'term' => 'Register'
    //     ];

    //     return view('frontend.user.register', compact('page'));
    // }

    // public function registerSubmit(Request $request) {
    //     if($request->input('form-name') == 'withEmail'){
    //         $request->validate([
    //             'email' => 'required|email',
    //             'password-1' => 'required|digits:6',
    //         ], [
    //             'password-1.required' => 'Please enter your password',
    //             'password-1.digits' => 'The password must be at least 6 characters',
    //         ]);
    //     }
    //     if($request->input('form-name') == 'withMobile'){
    //         $request->validate([
    //             'mobile' => 'required|numeric|digits:10',
    //             'password-2' => 'required|digits:6',
    //         ], [
    //             'password-2.required' => 'Please enter your password',
    //             'password-2.digits' => 'The password must be at least 6 characters',
    //         ]);
    //     }

    //     $data = $request->all();

    //     // $exist_user = Controller::getModel('User')::where([
    //     //     'email' => $request->input('email')
    //     // ])->whereOr([
    //     //     'mobile' => $request->input('mobile')
    //     // ])->first();

    //     // if(!$exist_user){
    //     //     $user = Controller::newModel('User');
    //     //     $user->fname = $request->input('name');
    //     //     $user->mobile = $request->input('mobile');
    //     //     $user->email = $request->input('email');
    //     //     $user->password = Hash::make($request->input('password'));
    //     //     $user->role = $request->input('user_role');

    //     //     if($user->save()){
    //     //         $user_details = Controller::newModel('UserDetails');
    //     //         $user_details->user_id = $user->id;
    //     //         $user_details->user_unique_id = Controller::generateUserCode($user->id, $request->input('user_type'));
    //     //         $user_details->user_type = $request->input('user_type');

    //     //         if($user_details->save()){
    //     //             $user_meta_key = $request->input('user_meta_key');
    //     //             $user_meta_value = $request->input('user_meta_value');

    //     //             for($i=0; $i<count($user_meta_key); $i++){
    //     //                 if($user_meta_value[$i]){
    //     //                     // $user_info = User_meta::where('meta_key', $user_meta_key[$i])->where('user_id', $vendor->id)->first();
    //     //                     $user_info = Controller::newModel('UserMeta');;
    //     //                     $user_info->user_id = $user->id;
    //     //                     $user_info->meta_key = $user_meta_key[$i];
    //     //                     $user_info->meta_value = $user_meta_value[$i];
    //     //                     $user_info->save();
    //     //                 }
    //     //             }
    //     //             $credentials = array(
    //     //                 'mobile' => $request->input('mobile'),
    //     //                 'password'  => $request->input('password'),
    //     //             );

    //     //             if(Auth::guard('user')->attempt($credentials )) {
    //     //                 return redirect()->intended('/');
    //     //             }
    //     //         }
    //     //     }
    //     //     else{
    //     //         return redirect()->back()->with('error','Something went wrong!');
    //     //     }
    //     // }
    //     // else{
    //     //     return redirect()->back()->with('error','User already exist');
    //     // }

    //     // return redirect()->back()->with('error','User already exist');
    //     return redirect()->to('/otp');
    // }






    // public function self() {
    //     return redirect()->back();
    // }

    // new scratch code

        public function register()
        {
            return view('frontend.user.register');
        }

        public function registerSubmit(Request $request)
        {
            try {
                $user = new User();
                $otp = rand(100000, 999999); // Generate a 6-digit OTP
                $user->remember_token = Str::random(60);

                if ($request->form_name == 'withMobile') {
                    $request->validate([
                        'mobile' => 'required|digits:10|unique:users,mobile_number',
                        'password' => 'required|min:6',
                    ]);

                    $user->mobile_number = $request->mobile;
                    $user->password = Hash::make($request->password);
                    $user->mobile_otp = $otp; // Store OTP for mobile
                    // dd($otp);
                } else {
                    $request->validate([
                        'email' => 'required|email|unique:users,email',
                        'password' => 'required|min:6',
                    ]);

                    $user->email = $request->email;
                    $user->password = Hash::make($request->password);
                    $user->email_otp = $otp; // Store OTP for email
                }

                $user->save();
                if ($user) {
                    if ($request->form_name == 'withEmail') {
                        Mail::to($user->email)->send(new SendRegistrationOTP($otp));
                        return redirect()->route('otp', ['token' => $user->remember_token])
                            ->with('success', 'A six-digit OTP has been sent to your mobile.');
                    }else {
                        $twilio = new TwilioService();
                        $message = "Your OTP for registration is: $otp";
                        $twilio->sendSMS($user->mobile_number, $message);
                        return redirect()->route('otp', ['token' => $user->remember_token])
                            ->with('success', 'A six-digit OTP has been sent to your mobile.');
                    }
                }

            } catch (\Illuminate\Validation\ValidationException $e) {
                return redirect()->back()
                    ->withErrors($e->validator)
                    ->withInput()
                    ->with('active_tab', $request->form_name == 'withMobile' ? 'pills-2' : 'pills-1');
            }
        }

        public function otp($token)
        {
            $page = [
                'term' => 'OTP'
            ];
            $user = User::where('remember_token', $token)->first();

            return view('frontend.user.otp', compact('page', 'token','user'));
        }

        public function resendOtp(Request $request)
        {
            $remember_token = $request->remember_token;
            $exist_user = User::where('remember_token', $request->remember_token)->first();
            $otp = rand(100000, 999999);
            $exist_user->email_otp = $otp;
            $exist_user->save();
            if($exist_user){
                Mail::to($exist_user->email)->send(new SendRegistrationOTP($otp));
            }
            return redirect()->route('otp', ['token' => $request->remember_token])->with('success','A six-digit OTP has been sent to your email.');

        }

        public function otpSubmit(Request $request)
        {
            $request->validate([
                'otp' => 'required|numeric|digits:6'
            ]);


            $exist_user = User::where('remember_token', $request->remember_token)->first();
            if ($request->otp == $exist_user->email_otp || $request->otp == $exist_user->mobile_otp) {
                $exist_user->email_verified_at = now();
                $exist_user->save();
                Auth::login($exist_user);
                return redirect()->route('setup')->with('success', 'You have successfully verified your otp.');
            } else {
                return redirect()->route('otp', ['token' => $request->remember_token])
                    ->withErrors(['otp' => 'You entered the wrong OTP. Please try again.']);
            }
        }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('register')->with('success','Logout Successfully');
    }

    // public function dashboard()
    // {
    //     dd('dashboard');
    // }
}
