<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Identity;
use App\Models\Transaction;
use App\Models\TransactionDetails;
use Illuminate\Http\Request;

class IdentitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ( Request $request)
    {
        $identities = Identity::latest()->paginate(10);

        if($request->has('search'))
        {
            $identities = Identity::where('receipt_number', 'LIKE', '%' .$request->search. '%')->paginate();
        }
        return view('pages.admin.identities.Identities', compact('identities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.identities.IdentitiesCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required|numeric',
            'address' => 'required'
        ]);
       
        $receipt_number = mt_rand(1000,9999);
        Identity::create([
            'receipt_number' => $receipt_number,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Identity::where('receipt_number', $id)->firstOrFail(); 
        $transaction = Transaction::where('receipt_number', $item->receipt_number)->firstOrFail();
        $total = TransactionDetails::where('receipt_number', $item->receipt_number)->sum('price');
        return view('pages.admin.identities.IdentitiesEdit', compact('item','transaction','total'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required|numeric',
            'address' => 'required'
        ]);
       
        Identity::where('receipt_number', $id)->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);
        return back();
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
