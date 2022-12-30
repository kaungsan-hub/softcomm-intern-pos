<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\{Item, Purchase, Supplier, PurchaseDetail, Store};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $purchases = Purchase::all();
        // $purchaseDetail = PurchaseDetail::all();
        return view('admin.purchase.index', compact('purchases'));
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
        $total_amount=$request->total_amount;
        $created_by=Auth()->user()->id;

        $request->validate([
            'purchase_date'=>'required',
            'supplier_id'=>'required', 
            'total_amount'=>'required'
        ]);
        DB::beginTransaction();
        try{
            $purchase = Purchase::create([
                'purchase_date'=>$purchase_date,
                'supplier_id'=>$supplier_id,
                'total_amount'=>$total_amount,
                'created_by'=>$created_by
            ]);
            for($i = 0; $i < count($request->item_ids); $i++){
                PurchaseDetail::create([
                    'purchase_id' => $purchase->id,
                    'item_id' => $request->item_ids[$i],
                    'quantity' => $request->qtys[$i],
                    'purchase_price' => $request->purchase_price[$i],
                    'amount' => $request->qtys[$i] * $request->purchase_price[$i]
                ]);
                Store::create([
                    'item_id' => $request->item_ids[$i],
                    'in_qty' => $request->qtys[$i],
                    'balance' => $request->qtys[$i] * $request->purchase_price[$i]
                ]);
            }
            DB::commit();
        }catch(\Exception $e) {
            DB::rollback();
        }
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
        Purchase::find($id)->delete();
        DB::table('purchase_details')->where('purchase_id', '=', $id)->delete();
        return back();
    }
}
