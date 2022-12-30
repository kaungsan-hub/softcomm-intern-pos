<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\Store;
use DateTime;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{

    public function index(Request $request)
    {
        if (isset($request->q)) {
            $sales = Sale::select('sales.*')
                    ->join("customers", "customers.id", "=", "sales.customer_id")
                    ->where('sales.id', 'LIKE', "%{$request->q}%")
                    ->orWhere('sale_date', 'LIKE', "%{$request->q}%")
                    ->orWhere('customers.name', 'LIKE', "%{$request->q}%")
                    ->get();
        } else {
            $sales = Sale::all();
        }

        return view('admin.sale.index', compact('sales'));
    }


    public function create()
    {
        $customers = Customer::all();
        $items =  Item::select('items.*')
                    ->join("set_prices", "set_prices.item_id", "=", "items.id")
                    ->join("stores", "stores.item_id", "=", "items.id")
                    ->get();
        return view('admin.sale.create-edit', compact('customers', 'items'));
    }

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

                $store = Store::find($request->item_ids[$i]);

                if($store->balance - $request->quantities[$i] < 0) {
                    return redirect('admin/sales/create')->with('msg', 'Insufficient items.');
                }

                $store->update([
                    'out_qty' => $store->out_qty + $request->quantities[$i],
                    'balance' => $store->balance - $request->quantities[$i],
                ]);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        Session::flash('msg-class', 'alert-success');
        return redirect('admin/sales')->with('msg', 'A sale has been done successfully.');
    }


    public function show(Sale $sale)
    {
        //
    }


    public function edit(Sale $sale)
    {
        //
    }


    public function update(Request $request, Sale $sale)
    {
        //
    }


    public function destroy($id)
    {
        Sale::find($id)->delete();
        SaleDetail::where('sale_id', '=', $id)->delete();
        return redirect('/admin/sales')->with('msg', 'One of Sales Information has been deleted successfully');
    }
}
