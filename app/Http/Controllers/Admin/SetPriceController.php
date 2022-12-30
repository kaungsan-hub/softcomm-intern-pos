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
        $items=Item::all(); 
        //$setprice = SetPrice::find($id);
        return view('admin.set-price.index',compact('setprices','items'));
    }


    public function create()
    {
        // $setprices = SetPrice::pluck('item_id'); //collection

        $item_ids = SetPrice::pluck('item_id')->toArray(); 

        $items=Item::whereNotIn('id', $item_ids)->get(); // whereIn and whereNotIn
 
        //$setprices = SetPrice::all('item_id')->toArray();
        //return $setprices; 
        //dd($setprices);
        return view('admin.set-price.create-edit',compact('items'));
    }

    public function store(Request $request)
    {
        $item_id = $request->item_id;
        $r1 = $request->r1;
        $r2 = $request->r2;     
        $created_by = Auth()->user()->id;  
        
        // dd($request->all());
        //dd($request->all());

        $request->validate([
            'item_id'=>'required',
            'r1'=>'required',
            'r2'=>'required'
            //'created_by'=>'required'
        ]); 

        // dd($request->all());


        SetPrice::create([
            'item_id'=>$item_id,
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
        $items=Item::all(); 
        $specificItem = Item::find(1);
        //dd($specificItem->setprice->r1);
        $setprice = SetPrice::find($id);
        //$items=Item::find($setprice->item_id); 
        return view('admin.set-price.create-edit',compact('setprice','items')); 
    }
 
    public function update(Request $request, $id)
    {
        $item_id = $request->item_id;
        $r1 = $request->r1;
        $r2 = $request->r2;     


        $request->validate([
            'item_id'=>'required',
            'r1'=>'required',
            'r2'=>'required'
        ]);

        SetPrice::find($id)->update([
            'item_id'=>$item_id,
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
