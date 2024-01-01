<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function loginView(){
        return view('login');
    }

    function login(Request $req){

        $user = User::where('email', $req->email)->first();

        if(!$user || $user->password != $req->password){
            return redirect()->route('login');
        }

        Auth::login($user);

        if(Auth::user()->role == 1){
            return redirect()->route('admin');
        }
        return redirect()->route('home');

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
