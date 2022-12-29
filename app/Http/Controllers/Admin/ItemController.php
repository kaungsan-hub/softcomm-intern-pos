<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Item, Brand, Category, ItemLocation};
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        if(isset($request->search)){
            $brands= Brand::all();
            $items = Item::query()
                ->where('name', 'LIKE', "%{$request->search}%")
                // ->orWhere('$brand->name', 'LIKE', "%{$request->search}%")
                // ->orWhere('category', 'LIKE', "%{$request->search}%")
                // ->orWhere('user', 'LIKE', "%{$request->search}%")
                ->orWhere('item_code', 'LIKE', "%{$request->search}%")
                ->get();
        }else{
        $items = Item::all();
        $brands = Brand::all();
        }
        return view('admin.item.index', compact('items','brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands=Brand::all();
        $categories=Category::all();
        $itemlocation=ItemLocation::all();
        return view('admin.item.create-edit', compact('brands','categories','itemlocation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item_code = $request->item_code;
        $name = $request->name;
        $brand_id = $request->brand_id;
        $category_id = $request->category_id;
        $item_location_id = $request->item_location_id;
        $warranty = $request->has('warranty') ? '1' : '0';
        $imei_status = $request->has ('imei_status') ? '1' : '0';
        $reorder_qty = $request->reorder_qty;
        $remark = $request->remark;
        $created_by = Auth()->user()->id;

        $request->validate([
            'item_code'=>'required',
            'name'=>'required',
            'reorder_qty'=>'required',
            'remark'=>'required'
        ]);

        Item::create([
            'item_code'=>$item_code,
            'name'=>$name,
            'brand_id'=>$brand_id,
            'category_id'=>$category_id,
            'item_location_id'=>$item_location_id,
            'warranty'=>$warranty,
            'imei_status'=>$imei_status,
            'reorder_qty'=>$reorder_qty,
            'remark'=>$remark,
            'created_by'=>$created_by
        ]);
        return redirect('/admin/items');
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
        $items=Item::find($id);
        $brands=Brand::all();
        $categories=Category::all();
        $itemlocation=ItemLocation::all();
        return view('admin.item.create-edit', compact('items','brands','categories','itemlocation'));
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
        $warranty = $request->has('warranty') ? '1' : '0';
        $imei_status = $request->has ('imei_status') ? '1' : '0';
        $created_by = Auth()->user()->id;
        $request->validate([
            'item_code'=>'required',
            'name'=>'required',
            'reorder_qty'=>'required',
            'remark'=>'required'
        ]);
        Item::find($id)->update([
            'item_code'=>$request->item_code,
            'name'=>$request->name,
            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'item_location_id'=>$request->item_location_id,
            'warranty'=>$warranty,
            'imei_status'=>$imei_status,
            'reorder_qty'=>$request->reorder_qty,
            'remark'=>$request->remark,
            'created_by'=>$created_by
        ]);
        session()->flash('msg','Update Successful');
        return redirect('admin/items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::find($id)->delete();
        session()->flash('msg', 'Item Remove Successful');
        return back();
    }
}
