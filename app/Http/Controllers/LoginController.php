<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        return view('authentication.login');
    }

    public function store(Request $request)
    {
        // dd($request->input('email'));
        // Validate credentials
        $validatedCredentials = $request->validate([
           'email' => ['required', 'email'],
           'password' => ['required']
        ]);
        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;
        if(Auth::attempt(['email' => $email, 'password' => $password], $remember)){
            $request->session()->regenerate(); //generate session

            return redirect('/'); // sends user back to index
        }
        // if login fails
        return back()->with('error_status', 'Email or Password matches no record');
    }
}
