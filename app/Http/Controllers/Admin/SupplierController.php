<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Supplier;

class SupplierController extends Controller
{

    public function index()
    {
        $suppliers = Supplier::paginate(10); 
        return view('admin.supplier.index',compact('suppliers'));
    }

    public function create()
    {
        return view('admin.supplier.create-edit');
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $contact_person = $request->contact_person;        

        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'contact_person'=>'required'
        ]);

        Supplier::create([
            'name'=>$name,
            'address'=>$address,
            'phone'=>$phone,
            'contact_person'=>$contact_person
        ]); 

        return redirect('/admin/suppliers')->with('msg','Stored Successfully.'); 
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('admin.supplier.create-edit',compact('supplier')); 
    }

    public function update(Request $request, $id)
    {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $contact_person = $request->contact_person;        

        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'contact_person'=>'required'
        ]);

        Supplier::find($id)->update([
            'name'=>$name,
            'address'=>$address,
            'phone'=>$phone,
            'contact_person'=>$contact_person
        ]);

        return redirect('admin/suppliers')->with('msg','Updated Successfully.'); 
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id); 
        $supplier->delete(); 
        return back()->with('msg','Deleted Successfully.');
    }
}
