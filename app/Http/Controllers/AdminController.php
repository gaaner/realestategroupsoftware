<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login() {
    	#dd(Hash::make('gustavo2017'));
    	return view('admin.auth.login');
    }

    public function authenticate(Request $request) {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            // Check for admin permission.
            if(Auth::user()->level == 9) {
            	return redirect()->route('admin.property.index');
            }
        }

        return redirect()->back()->withErrors('E-mail ou senha incorretos.');
    }

    public function logout() {
    	Auth::logout();

    	return redirect()->route('admin.login');
    }
}
