<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\SignedUser;
use Illuminate\Http\Request;
use App\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        //validate
        $attributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', Password::min(8), 'confirmed'],
            'terms' => ['required'],
        ]);
        unset($attributes['terms']);

        //create the user
        $user = User::create($attributes);

        //send verification email
        //   $user->notify(new VerifyEmail()); 

        //send the email
        Mail::to($user->email)->send(
            new SignedUser($user)
        );

        //redirect
        return redirect()->route('verification.notice');
    }
}
