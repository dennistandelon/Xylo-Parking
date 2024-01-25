<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App;

class TransactionController extends Controller
{
    function customerView($locale='en'){

        App::setLocale($locale);
        if(!Auth::check()){
            return redirect()->route('loginView');
        }

        $user = Auth::user();
        $transaction = Transaction::where('user_email',$user->email)->whereNull('out_date')->first();

        return view('home')->with('transaction', $transaction);
    }

    function adminView($locale='en'){

        App::setLocale($locale);

        $transaction = Transaction::all();

        return view('admin')->with('transaction', $transaction);
    }

    function create(Request $req){
        $validateData = $req->validate([
            'police_number'=>'required|min:3'
        ]);

        $transaction = new Transaction;

        $transaction->parking_id = Str::random($length = 10);
        $transaction->police_number = $req->police_number;
        $transaction->user_email = Auth::user()->email;
        $transaction->in_date = now();
        $transaction->total_price = 0;
        $transaction->total_hours = 0;

        $transaction->save();

        return redirect()->back();
    }

    function update(Request $req){
        $transaction = Transaction::find($req->id);

        if($req->police_number != $transaction->police_number){
            return redirect()->back()->withErrors([
                'police_number' => 'Police number not match',
            ]);
        }


        $transaction->out_date = now();
        $hours = (strtotime($transaction->out_date) - strtotime($transaction->in_date))/3600;

        $transaction->total_hours = ceil($hours);
        $transaction->total_price = ceil($hours) * 3000;

        $transaction->save();

        return redirect()->back();
    }

    function delete($id){
        $tr = Transaction::find($id);

        $tr->delete();

        return redirect()->back();
    }
}
