<?php

namespace App\Http\Controllers;
use App\Branch;
use Illuminate\Http\Request;
use App\Http\Requests\CreateBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use Illuminate\Support\Facades\Storage;


class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $branches = Branch::withTrashed()->get();
        return view('auth.master.branch.branch')->with('branches', $branches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('auth.master.branch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBranchRequest $request)
    {
         Branch::create([
            'name' => $request->name,
            'address' => $request->address,
            'mob' => $request->mob
           
          
        ]);

        session()->flash('status', 'Branch Created successfully');
        return redirect()->route('branch.index');
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
    public function edit(Branch $branch)
    {
         return view('auth.master.branch.edit')->with('branch', $branch);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        $data = $request->only(['name', 'price', 'quantity', 'unit_id']);
        $branch->update($data);
        session()->flash('status', ' Branch Updated successfully');
        return redirect()->route('branch.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
        session()->flash('status', 'Deleted successfully');
        return redirect()->route('branch.index');
    }

      public function restore( $id)
    {
       
        $branch = Branch::withTrashed()->where('id', $id)->first();
        if (!$branch) {
            return 'Item Does Not Exixt!';
        }
        else
        {

        $branch ->restore();

        session()->flash('status', ' Record Restored successfully');
        return redirect()->route('branch.index');
    }

    }
}
