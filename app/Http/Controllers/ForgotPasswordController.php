<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot-password');
    }
    public function sendOTP(Request $request)
    {
        //validate
        $request->validate([ 'email' => 'required|email',]);

        //Generate OTP
        $otp=rand(100000,999999);

          // Store OTP in cache with expiration (e.g., 10 minutes)
        Cache::put('otp_' . $request->email, $otp, now()->addMinutes(10));

        //send OTP
        Mail::to($request->email)->send(new SendOTP($otp));
        
         // Redirect to OTP verification page
         return redirect()->route('password.verify')->with('email', $request->email);
    }
}
