<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ItemLocation;
use Illuminate\Http\Request;

class ItemLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemsLocation = ItemLocation::paginate(10);
        return view('admin.item-location.index',compact('itemsLocation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.item-location.create-edit');
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
            'name' => 'required|unique:item_locations,name|min:3',
            'description' => 'required|min:3'
        ]);

        ItemLocation::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_by'  => 1
        ]);
        return redirect()->route('item-location.index')->with('msg','Item-Location has been created successfully.');
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
        $itemLocation = ItemLocation::findOrFail($id);
        return view('admin.item-location.create-edit',compact('itemLocation'));
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
            'description' => 'required'
        ]);

        ItemLocation::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'created_by'  => 1
        ]);
        return redirect()->route('item-location.index')->with('msg','Item-Location has been updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ItemLocation::findOrFail($id)->delete();
        return back()->with('msg','Item-Location has been deleted successfully');
    }
}
