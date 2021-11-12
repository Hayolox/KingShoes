<?php

namespace App\Http\Controllers;

use App\Models\Identity;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $transaction = Transaction::where('receipt_number', $request->search)->paginate();
            $count = Transaction::where('receipt_number', $request->search)->count();
            $identities = Identity::where('receipt_number', $request->search)->get();
            return view('pages.home', compact('transaction','count','identities'));
        }else{
            return view('pages.home');
        }
    }
}
