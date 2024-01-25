<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App;

class AuthController extends Controller
{
    function loginView($locale='en'){

        App::setlocale($locale);

        return view('login');
    }

    function login(Request $req){

        $validateData = $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(Auth::attempt($validateData)){
            $req->session()->regenerate();

            $locale = App::currentLocale();
            if(Auth::user()->role == 1){
                return redirect()->route('admin',["locale"=>$locale])->with('user', Auth::user());
            }
            return redirect()->route('home',["locale"=>$locale])->with('user', Auth::user());
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }

    function logout(Request $req){
        Auth::logout();

        $locale = $req->locale;
        return redirect()->route('loginView',["locale"=>$locale]);
    }

    function registerView($locale='en'){

        App::setlocale($locale);
        return view('register');
    }

    function register(Request $req){
        $validateData = $req->validate([
            'email'=>'required|email',
            'password'=>'required|min:8',
            'name'=>'required'
        ]);


        $user = new User;

        $user->name = $req->name;
        $user->email = $req->email;
        $user->role = 0; // 0 = customer, 1 = admin
        $user->password = bcrypt($req->password);

        $user->save();

        return redirect()->back();
    }
}
