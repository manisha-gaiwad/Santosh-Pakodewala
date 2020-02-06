<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request; 
use App\Http\Requests\CreateItemRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $items = Item::withTrashed()->get();
         return view('auth.master.item.item')->with('items',  $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = DB::table('units')->get();

        return view('auth.master.item.create', ['data' => $data]);
                   
        return view('auth.master.item.create', compact('data'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateItemRequest $request)
    {
        Item::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'unit_id' =>$request->unit_id,
            
           
          
        ]);

        session()->flash('status', 'Created successfully');
        return redirect()->route('item.index');
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
    public function destroy(Item $item)
    {
         $item->delete();
        session()->flash('status', 'Deleted successfully');
        return redirect()->route('item.index');
    }

     public function restore( $id)
    {
        // DB::table('viewuser')->where('id', '=', $id )->delete();
        $item = Item::withTrashed()->where('id', $id)->first();
        if (!$item) {
            return 'Item Does Not Exixt!';
        }
        else
        {

        $item ->restore();

        session()->flash('status', ' Record Restored successfully');
        return redirect()->route('item.index');
    }

    }
}
