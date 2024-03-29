<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\OpeningDetail;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Opening;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OpeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->q)) {
            $openings = Opening::query()
                ->where('remark', 'LIKE', "%{$request->q}%")
                // ->orWhere('created_by', 'LIKE', "%{$request->q}%")
                ->paginate(10);
        } else {
            $openings = Opening::paginate(10);
        }
        // $openingDetails = OpeningDetail::all();

        return view('admin.opening.index',compact('openings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        return view('admin.opening.create-edit',compact('items'));

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
            'remark' => 'required',
        ]);

        DB::beginTransaction();
        try{

            $opening = Opening::create([
            'remark' => $request->remark,
            'created_by' => Auth()->user()->id
            ]);

            for($i=0; $i<count($request->items);$i++){
                OpeningDetail::create([
                    'opening_id' => $opening->id,
                    'item_id' => $request->items[$i],
                    'quantity' => $request->quantities[$i],
                ]);

                Store::create([
                    'item_id' => $request->items[$i],
                    'in_qty' => $request->quantities[$i],
                    'balance' => $request->quantities[$i],
                ]);
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
        }
        return redirect()->route('openings.index')->with('msg','Opening has been created successfully.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
