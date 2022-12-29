<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Http\Request;


class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->search)) {
            $counters = Counter::select('counters.*')
                ->join('users','counters.created_by','=','users.id')
                ->where('name', 'LIKE', "%{$request->search}%")
                ->paginate(10);
        } else {
            $counters = Counter::paginate(10);
        }
        return view('admin.counter.index',compact('counters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.counter.create-edit');
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
            'name' => 'required|unique:counters,name|min:3',
        ]);

        Counter::create([
            'name' => $request->name,
            'created_by'  => Auth()->user()->id
        ]);
        return redirect()->route('counters.index')->with('msg','Counter has been created successfully.');
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
        $counter = Counter::findOrFail($id);
        return view('admin.counter.create-edit',compact('counter'));
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
        ]);

        Counter::findOrFail($id)->update([
            'name' => $request->name,
            'created_by'  => Auth()->user()->id
        ]);
        return redirect()->route('counters.index')->with('msg','Counter has been updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Counter::findOrFail($id)->delete();
        return back()->with('msg','Counter has been deleted successfully');
    }
}
