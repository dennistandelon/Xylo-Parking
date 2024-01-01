<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    function customerView(){

        return view('home');
    }

    function adminView(){

        $transactions = Transaction::all();

        return view('admin')->compact('transactions');
    }

    function create(Request $req){
        $transaction = new Transaction;

        $transaction->parking_id = Str::random($length = 10);
        $transaction->police_number = $req->police_number;
        $transaction->in_date = time();

        $transaction->save();
    }

    function update(Request $req){
        $transaction = Transaction::find($req->id);

        $transaction->out_date = time();
        $transaction->total_hours = $transaction->out_date - $transaction->in_date;
        $transaction->total_price = $req->total_hours * 3000;

        $transaction->save();
    }
}
