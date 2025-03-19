<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
  public function create()
  {
    return view('auth.login');
  }
  public function store()
  {
    //validate
    $attributes = request()->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    //attempt to login the user
    if (! Auth::attempt($attributes)) {
      throw ValidationException::withMessages([
        'email' => 'Sorry, those credentials do not match.'
      ]);
    }
  

    //regenerate the session token
    request()->session()->regenerate();

//if user is admin
// if (Auth::check() && Auth::user()->role === 'admin') {
//   return redirect('/admin/dashboard');
// }

   // Redirect based on role
   return Auth::user()->isAdmin()
   ? redirect('/admin/dashboard')
   : redirect('/');
   
    //redirect
    return redirect('/');
  }
  public function destroy(Request $request)
  {
    Auth::logout();
    Session::flush(); 

    // Prevent back button access
    $request->session()->invalidate();
    $request->session()->regenerateToken();


    return redirect('/');
  }
}