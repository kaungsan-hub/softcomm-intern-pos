<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('admin.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.item.create-edit');
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
        return view('admin.item.create-edit', compact('items'));
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