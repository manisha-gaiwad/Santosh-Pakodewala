<?php

namespace App\Http\Controllers;
use App\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateExpensesRequest;
USE Illuminate\Support\Collection;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $expenses = Expenses::withTrashed()->get();
        return view('auth.expenses.index')->with('expenses',  $expenses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $branch_data = DB::table('branches')->get();
         $unit_data = DB::table('units')->get();

        return view('auth.expenses.create', ['branch_data' => $branch_data, 'unit_data' => $unit_data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateExpensesRequest $request)
    {
        Expenses::create([
            'date' => $request->date,
            'branch_id' => $request->branch_id,
            'item_details' => $request->item_details,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'total_price' =>$request->total_price,
            'unit_id' =>$request->unit_id,  
          
        ]);

        session()->flash('status', 'Created successfully');
        return redirect()->route('expenses.index');
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
        $expenses = \App\Expenses::findOrFail($id);
        return view('auth.expenses.edit')->with('expenses', $expenses);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateExpensesRequest $request,  $id)
    {
         $data = $request->only(['date', 'branch_id', 'item_details', 'quantity', 'price', 'total_price', 'unit_id']);
          DB::table('expenses')
            ->where('id', $id)
            ->update($data);
        
   
        session()->flash('status', 'Updated successfully');
        return redirect()->route('expenses.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
         DB::table('expenses')->where('id', '=', $id )->delete();

        
        session()->flash('status', 'Deleted successfully');
        return redirect()->route('expenses.index');
    }

   
     public function restore( $id)
    {
        // DB::table('viewuser')->where('id', '=', $id )->delete();
        $expenses = Expenses::withTrashed()->where('id', $id)->first();
        if (!$expenses) {
            return 'Item Does Not Exixt!';
        }
        else
        {

        $expenses ->restore();

        session()->flash('status', ' Record Restored successfully');
        return redirect()->route('expenses.index');
        }

    }
    function search(Request $request)
    {
     if(request()->ajax())
     {
      if(!empty($request->from_date))
      {
       $data = DB::table('expenses')
         ->whereBetween('date', array($request->from_date, $request->to_date))
         ->get();
      }
      else
      {
       $data = DB::table('tbl_order')
         ->get();
      }
      return datatables()->of($data)->make(true);
     }
     return view('daterange');
    }


}
