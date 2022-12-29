<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\SetPrice;

use App\Models\Item;


class SetPriceController extends Controller
{

    public function index()
    {
        $setprices = SetPrice::paginate(10); 
        return view('admin.set-price.index',compact('setprices'));
    }


    public function create()
    {
        $items=Item::all(); 
        return view('admin.set-price.create-edit',compact('items'));
    }

    public function store(Request $request)
    {
        $item_code = $request->item_code;
        $r1 = $request->r1;
        $r2 = $request->r2;     
        $created_by = Auth()->user()->id;        

        $request->validate([
            'item_code'=>'required',
            'r1'=>'required',
            'r2'=>'required',
            'created_by'=>'required'
        ]);

        SetPrice::create([
            'item_code'=>$item_code,
            'r1'=>$r1,
            'r2'=>$r2,
            'created_by'=>$created_by
        ]); 

        return redirect('/admin/setprices')->with('msg','Stored Successfully.'); 
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $setprices = SetPrice::find($id);
        return view('admin.set-price.create-edit',compact('setprices')); 
    }
 
    public function update(Request $request, $id)
    {
        $item_code = $request->item_code;
        $r1 = $request->r1;
        $r2 = $request->r2;     
        $created_by = Auth()->user()->id;        

        $request->validate([
            'item_code'=>'required',
            'r1'=>'required',
            'r2'=>'required',
            'created_by'=>'required'
        ]);

        SetPrice::find($id)->update([
            'item_code'=>$item_code,
            'r1'=>$r1,
            'r2'=>$r2
        ]); 

        return redirect('/admin/setprices')->with('msg','Updated Successfully.'); 
    }
  
    public function destroy($id)
    {
        $setprices = SetPrice::find($id); 
        $setprices->delete(); 
        return back()->with('msg','Deleted Successfully.');
    }
}
