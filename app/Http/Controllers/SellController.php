<?php

namespace App\Http\Controllers;
use App\Sell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateSellRequest;
use App\sellItems;
use Illuminate\Database\Query\Builder;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     

    public function index()
    {
         $sell_data = SellItems::withTrashed()->get(); 
        return view('auth.Sell-Master.index')->with('sell_data',  $sell_data );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item_data = DB::table('items')->get();

        return view('auth.Sell-Master.create', ['item_data' => $item_data]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $invoice_data=$request->all();
         $sell_id =sellItems::create([
             'date' => $request->date,
            'total' => $request->total,
            'adjustment' => $request->adjustment,
            'adjustment_remark' => $request->adjustment_remark
        ])->id;
           if (count($request->item_name) > 0) 
          {
            foreach ($request->item_name as $item => $value)
             {
             $data2 = array(
                 'sell_item_id'=>$sell_id,
                 'item_name'=> $request->item_name[$item],
                 'quantity'=>$request->quantity[$item],
                 'price'=>$request->price[$item],
                 'total_price'=>$request->total_price[$item]
              );
             Sell::insert($data2);
         }
            }
               session()->flash('status', 'Created successfully');
               return redirect()->route('sell.index');  
   }

   public function item()
   {
    $item_data = DB::table('items')->get();
    return view('auth.Sell-Master.item', ['item_data' => $item_data]);
   }
    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $item_data = DB::table('sell_items')
       ->rightJoin('sell_details', 'sell_items.id', '=', 'sell_details.sell_item_id')
       ->where('sell_items.id', $id)
       ->get();

          $sell_data = DB::table('sell_items')->get();

        return view('auth.Sell-Master.show', ['item_data' => $item_data, 'sell_data' => $sell_data]);
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

     public function restore( $id)
    {
        // DB::table('viewuser')->where('id', '=', $id )->delete();
        $sellitems = SellItems::withTrashed()->where('id', $id)->first();
        if (!$sellitems) {
            return 'Item Does Not Exixt!';
        }
        else
        {

        $sellitems ->restore();

        session()->flash('status', ' Record Restored successfully');
        return redirect()->route('sell.index');
    }

    }


    // public function prnpriview($id)
    // {
    //     $item_data = DB::table('sell_items')
    //    ->rightJoin('sell_details', 'sell_items.id', '=', 'sell_details.sell_item_id')
    //    ->where('sell_items.id', $id)
    //    ->get();

    //       // $item_data = DB::table('items')->get();

    //     return view('auth.Sell-Master.print', ['item_data' => $item_data]);
    // }
}
