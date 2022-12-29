<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\{Item, Purchase, Supplier, PurchaseDetail};
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.purchase.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        $suppliers =Supplier::all();
        return view('admin.purchase.create-edit', compact('items', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchase_date=$request->purchase_date;
        $supplier_id=$request->supplier_id;
        $total_amount=5;
        $created_by=Auth()->user()->id;
        $update_by=Auth()->user()->id;

        $request->validate([
            'purchase_date'=>'required',
            'supplier_id'=>'required', 
        ]);
        
        Purchase::create([
            'purchase_date'=>$purchase_date,
            'supplier_id'=>$supplier_id,
            'total_amount'=>$total_amount,
            'created_by'=>$created_by,
            'update_by'=>$update_by
        ]);

        PurchaseDetail::create([
            // $purchase_id=;
            // $item_id=;
            // $item_code=;
            // $quantity=;
            // $purchase_price=;
            // $amount=;
        ]);
        return redirect('/admin/purchases');
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
        //
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
        //
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
