<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create-edit');
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
            'name' => 'required',
            'contact_person' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
            'region' => 'required',
            'city' => 'required',
            'remark' => 'required',
        ]);
       
       Customer::create([
        'name' => $request->name,
        'contact_person' => $request->contact_person,
        'phone' => $request->phone,
        'address' => $request->address,
        'email' => $request->email,
        'region' => $request->region,
        'city' => $request->city,
        'remark' => $request->remark,
       ]);
        
       return redirect('/admin/customers')->with('msg','Customer has been created!!');

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
        $customers = Customer::findOrFail($id);
        return view('admin.customer.create-edit',compact('customers'));
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
            'contact_person' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
            'region' => 'required',
            'city' => 'required',
            'remark' => 'required',
        ]);
       
       Customer::find($id)->update([
        'name' => $request->name,
        'contact_person' => $request->contact_person,
        'phone' => $request->phone,
        'address' => $request->address,
        'email' => $request->email,
        'region' => $request->region,
        'city' => $request->city,
        'remark' => $request->remark,
       ]);
        
       return redirect('/admin/customers')->with('msg','Customer has been updated!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Customer::find($id)->delete();
       return back()->with('msg','Customer has been deleted');
    }
}
