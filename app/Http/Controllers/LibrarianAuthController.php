<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibrarianAuthController extends Controller
{
    // show login page
    public function loginPage(){
        return view("pages.login");
    }

    // login librarian
    public function login(Request $request){
       $credentials = $request->validate([
            'email'    => 'required',
            'password' => 'required|min:6',
        ]);

        Auth::guard('librarian')->attempt($credentials);

        if(Auth::guard('librarian')->attempt($credentials)){
            return redirect()->route('dashboard')->with('success', 'Login Successful!');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->onlyInput('email');
    }


     // 🚪 Logout
    public function logout(Request $request)
    {
        Auth::guard('librarian')->logout();

        return redirect()->route('librarian.login')->with('success', 'Logged out successfully.');
    }

}
