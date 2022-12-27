<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
class ItemsController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('admin.item.index', compact('items'));
    }
    public function create()
    {
        return view('admin.item.create-edit');
    }
    public function store(Request $request)
    {
        $item_code = $request->item_code;
        $name = $request->name;
        $brand_id = 1;
        $category_id = 1;
        $item_location_id = 1;
        $warranty = $request->has('warranty') ? '1' : '0';
        $imei_status = $request->has ('imei_status') ? '1' : '0';
        $remark = $request->remark;
        $created_by = 1;

        $request->validate([
            'item_code'=>'required',
            'name'=>'required',
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
            'remark'=>$remark,
            'created_by'=>$created_by
        ]);
        return redirect('/admin/items');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $items=Item::find($id);
        return view('admin.item.create-edit', compact('items'));
    }
    public function update(Request $request, $id)
    {
        $warranty = $request->has('warranty') ? '1' : '0';
        $imei_status = $request->has ('imei_status') ? '1' : '0';
        $request->validate([
            'item_code'=>'required',
            'name'=>'required',
            'remark'=>'required'
        ]);
        Item::find($id)->update([
            'item_code'=>$request->item_code,
            'name'=>$request->name,
            'warranty'=>$warranty,
            'imei_status'=>$imei_status,
            'remark'=>$request->remark
        ]);
        session()->flash('msg','Update Successful');
        return redirect('admin/items');
    }
    public function destroy($id)
    {
        Item::find($id)->delete();
        session()->flash('msg', 'Item Remove Successful');
        return back();
    }
}
