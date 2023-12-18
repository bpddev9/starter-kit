<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login(){
        return view("pages.auth.login");
    }

    public function loginPost(Request $request){
        $credentials = $this->validate($request,[
            'email'=> ['required', 'email', 'exists:users,email'],
            'password'=> ['required'],

        ],[
            'email.exists' => 'Please check your email'
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            return response()->json(['status' => 'success', 'message' => 'Logged-in successfully']);
        }
        else {
            return response()->json(['status'=> 'error', 'message'=> 'Given credentials are incorrect']);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
