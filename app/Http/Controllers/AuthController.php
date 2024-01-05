<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    function loginView(){
        return view('login');
    }

    function login(Request $req){

        $validateData = $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(Auth::attempt($validateData)){
            $req->session()->regenerate();

            if(Auth::user()->role == 1){
                return redirect()->route('admin')->with('user', Auth::user());
            }
            return redirect()->route('home')->with('user', Auth::user());
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }

    function logout(){
        Auth::logout();

        return redirect()->route('login');
    }

    function registerView(){
        return view('register');
    }

    function register(Request $req){
        $user = new User;

        $user->name = $req->name;
        $user->email = $req->email;
        $user->role = 0; // 0 = customer, 1 = admin
        $user->password = $req->password;

        $user->save();
    }
}
