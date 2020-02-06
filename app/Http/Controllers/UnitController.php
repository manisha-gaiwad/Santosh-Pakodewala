<?php

namespace App\Http\Controllers;


use App\Unit;
use Illuminate\Http\Request; 
use App\Http\Requests\unit\CreateUnitRequest;
use Illuminate\Support\Facades\Storage;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $units = Unit::withTrashed()->get();
         return view('auth.master.unit.index')->with('units',  $units);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.master.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store()
    {
         

        $data=request()->validate([
            'unit'=>'required|string|unique:units'    
        ]);
        $unit= new \App\Unit();
        $unit->unit = request('unit');
        $unit->save();

        session()->flash('status', ' Units Created successfully');
        return redirect()->route('unit.index');
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
    public function update(CreateUnitRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
         $unit->delete();
        session()->flash('status', 'Deleted successfully');
        return redirect()->route('unit.index');
    }


     public function restore( $id)
    {
        // DB::table('viewuser')->where('id', '=', $id )->delete();
        $user = Unit::withTrashed()->where('unit_id', $id)->first();
        if (!$user) {
            return 'User Does Not Exixt!';
        }
        else
        {

        $user ->restore();

        session()->flash('status', ' Record Restored successfully');
        return redirect()->route('unit.index');
    }

    }


}
