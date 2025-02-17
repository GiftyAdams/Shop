<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function verify(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->markEmailAsVerified();
        
        //login
        Auth::login($user);
        

        // generate user token based on the id and store in session
        // $token = base64_encode($user->id);
        // $request->session()->put('user_token', $token);

        return redirect('/');
    }
}
