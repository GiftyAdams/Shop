<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\SendOTP;
use App\Models\UserOtp;
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
        $request->validate(['email' => 'required|email|exists:users,email']);

        //Generate OTP
        $otp = rand(100000, 999999);

        //Delete current otp
        // UserOtp::where('email', $request->email)->delete();

        //send OTP
        Mail::to($request->email)->send(new SendOTP($otp));

        // Store email and otp in database
        UserOtp::updateOrCreate([
            'email' => $request->email
        ],[
            'otp' => $otp,
            'expires_at' => now()->addMinutes(10)
        ]);

        //store email in session
        session(['email' => $request->email]);

        // Redirect to OTP verification page
        return redirect()->route('password.verify') ->with('success', 'OTP sent successfully.');
    }

    public function verifyOTP(Request $request)
    {
        // Validate email and otp
        $request->validate([
            // 'email' => 'required|email|exists:users,email',
            'otp1' => 'required|digits:1',
            'otp2' => 'required|digits:1',
            'otp3' => 'required|digits:1',
            'otp4' => 'required|digits:1',
            'otp5' => 'required|digits:1',
            'otp6' => 'required|digits:1',
        ]);

        // Concatenate OTP
        $otp = implode('', [
            $request->otp1,
            $request->otp2,
            $request->otp3,
            $request->otp4,
            $request->otp5,
            $request->otp6,
        ]);

        // Retrieve OTP from the database
        $user_otp = UserOtp::where('otp', $otp)->first();
        
        // If OTP is incorrect
        if (!$user_otp) {
            return back()->withErrors(['otp' => "Invalid or expired OTP. You entered: $otp"]);
        }

        // Delete OTP after use
        $user_otp->delete();

        // Redirect to reset password page
        return redirect()->route('password.reset.form')->with('success', 'OTP verified successfully.');
    }

    public function resetPassword(Request $request)
    {
        // Validate input
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        // Retrieve user using email stored in session
        $email = session('email'); // Get the email from the session
        $user = User::where('email', $email)->first();


        if (!$user) {
            return back()->withErrors(['email' => 'User not found.']);
        }

        // Update password
        $user->update(['password' => bcrypt($request->password)]);

        return redirect()->route('login')->with('success', 'Password reset successfully.');
    }
}
