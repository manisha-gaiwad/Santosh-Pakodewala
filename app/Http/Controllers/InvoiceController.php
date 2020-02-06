<?php

namespace App\Http\Controllers;
use App\Invoice;
use App\InvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateInvoiceRequest;
use Illuminate\Database\Query\Builder;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $invoice = \App\Invoice::withTrashed()->get();

       // $invoice = DB::table('invoices')
       // ->rightJoin('vendor', 'invoices.vendor_id', '=', 'vendor.id')
       // ->get();
        return view('auth.purchase.index')->with('invoice', $invoice);
    }


    // $singleData = $this->album
    // ->join('page','page_album.id','=','page.slug_id')
    // ->whereNotNull('page.deleted_at')
    // ->onlyTrashed()
    // ->paginate(15);  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $vendor_data = DB::table('vendor')->get();
           $invoice_data = DB::table('invoices_status')->get();

        return view('auth.purchase.create', ['vendor_data' => $vendor_data, 'invoice_data' => $invoice_data]);
        
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
         $invoice_id=Invoice::create([

            'vendor_id' => $request->vendor_id,
            'invoice_status_id' => $request->invoice_status_id,
            'invoice_number' => $request->invoice_number,
            'invoice_date' =>$request->invoice_date,
            'payment_mode' => $request->payment_mode,
            'challan_number' => $request->challan_number,
            'net_amount' => $request->net_amount,
            'paid_amount' => $request->paid_amount,
            'remaining_amount' => $request->remaining_amount,
            'remark' => $request->remark,
            'status' => $request->status
          
        ])->id;
           if (count($request->item_name) > 0) 
          {
            foreach ($request->item_name as $item => $value)
             {
             $data2 = array(
                 'invoice_id'=>$invoice_id,
                 'item_name'=> $request->item_name[$item],
                 'quantity'=>$request->quantity[$item],
                 'price'=>$request->price[$item],
                 'total_price'=>$request->total_price[$item]
              );
             InvoiceItem::insert($data2);
         }
            }
               session()->flash('status', 'Created successfully');
               return redirect()->route('invoice.index');  
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
    public function destroy(Invoice $invoice)
    {
        
       $invoice->delete();
        session()->flash('status', 'Deleted successfully');
        return redirect()->route('invoice.index');
    }


     public function restore( $id)
    {
        // DB::table('viewuser')->where('id', '=', $id )->delete();
        $invoice = Invoice::withTrashed()->where('id', $id)->first();
        if (!$invoice) {
            return 'Invoice Does Not Exixt!';
        }
        else
        {

        $invoice ->restore();

        session()->flash('status', ' Record Restored successfully');
        return redirect()->route('invoice.index');
    }

    }
}
