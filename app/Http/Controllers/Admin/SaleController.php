<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Sale;
use App\Models\SaleDetail;
use DateTime;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        return view('admin.sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items =  Item::select('items.*')
                    ->join("set_prices", "set_prices.item_id", "=", "items.id")
                    ->get();
        dd($items);
        return view('admin.sale.create-edit', compact('items'));
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
            'customer_id' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $date = new DateTime(date("Y/m/d"));
            $dateString = $date->format('Y-m-d');
            $sale = Sale::create([
                'sale_date' => $dateString,
                'customer_id' => $request->customer_id,
                'total_amount' => $request->totalAmount,
                'created_by' => Auth()->user()->id,
            ]);
            for ($i = 0; $i < count($request->item_ids); $i++) {
                $item = Item::find($request->item_ids[$i]);
                $amount = $item->setprice->r1 * $request->quantities[$i];
                SaleDetail::create([
                    'sale_id' => $sale->id,
                    'item_id' => $request->item_ids[$i],
                    'quantity' => $request->quantities[$i],
                    'amount' => $amount,
                ]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        Session::flash('msg-class', 'alert-success');
        return redirect('admin/sales')->with('msg', 'A sale has been done successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
