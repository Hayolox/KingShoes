<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Identity;
use App\Models\PackageType;
use App\Models\Transaction;
use App\Models\TransactionDetails;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function create( Request $request,$id)
    {
        $costumer = Identity::where('receipt_number', $id)->firstOrFail();
        $package = PackageType::get();
        return view('pages.admin.transactions.TransactionCreate', compact('costumer','package'));
    }

    public function proses(Request $request, $id)
    {
        $request->validate([
            'name_shoe' => 'required',
            'package_types_id' => 'required'
        ]);

        Transaction::create([
            'receipt_number' => $id,
            'package_types_id' => $request->package_types_id,
            'name_shoe' => $request->name_shoe,
            'status' => 'proses',

        ]);
        return back();
    }

    public function delete($id)
    {
        $item = Transaction::findOrFail($id);
        $item->delete();
        if($item->count() > 2)
        {
            return back();
        }else{
            return redirect()->route('Identities.index');
        }
    }

    public function status($id)
    {
        $item = Transaction::findOrFail($id);
      
        if($item->status == 'proses')
        {
          
            $item->update([
                'status' => 'selesai'
            ]);
            if ($item->package_types_id == 1){
                $price = 25000;
            }else{
                $price = 35000;
            };
            TransactionDetails::create([
                'receipt_number' => $item->receipt_number,
                'transaction_id' => $id,
                'price' => $price,
            ]);
            
        }else
        {
          
            $item->update([
                'status' => 'proses'
            ]);
            $transaction_details = TransactionDetails::where('transaction_id', $item->id)->firstOrFail();
            $transaction_details->delete();
        }
        return back();

       
    }
}
