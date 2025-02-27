<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }
    public function update(Request $request)
    {
    //validate
    $request->validate([
   'first_name' =>'required',
    'last_name' => 'required',
'email' => ['required', 'email', 'unique:users,email,' . Auth::id()],
    'phone_number' => 'required',
    'address' => 'required'
    ]);


    //update user details
    Auth::user()->update($request->only([
        'first_name', 'last_name', 'email', 'phone_number', 'address'
    ]));

    //return to profile index
    return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }
}
