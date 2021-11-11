<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Identity;
use App\Models\PackageType;
use App\Models\Transaction;
use App\Models\TransactionDetails;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $identities = Identity::with(['transaction'])->whereHas('transaction', function($transaction){
            $transaction->where('status', 'selesai');
        })->count();
        $identitiy = Identity::with(['transaction'])->whereHas('transaction', function($transaction){
            $transaction->where('status', 'proses');
        })->count();
        $shoe = Transaction::where('status', 'selesai')->count();
        $income = TransactionDetails::sum('price');
        return View('pages.admin.Dashboard', compact('identities','shoe','identitiy','income'));
    }
}
