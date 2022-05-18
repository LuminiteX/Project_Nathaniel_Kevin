<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }

    public function showHistory(){
        $user_id = auth()->user()->id;

        $user_history = User::find($user_id)->transactions;

        $data=['user_history' => $user_history];
        
        return view('history',$data);
    }

}
