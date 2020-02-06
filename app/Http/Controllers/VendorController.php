<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request; 
use App\Http\Requests\CreateVendorRequest;  
use App\Http\Requests\UpdateVendorRequest;
use Illuminate\Support\Facades\Storage;


class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::withTrashed()->get();
        return view('auth.master.vendor.index')->with('vendors', $vendors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.master.vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVendorRequest $request)
    {
        Vendor::create([
            'name' => $request->name,
            'mob' => $request->mob,
            'email' => $request->email,
            'business_type_id' =>$request->business_type_id,
            'gstin_number' => $request->gstin_number,
            'pan_number' => $request->pan_number,
            'ifc_code' => $request->ifc_code,
            'bank_name' => $request->bank_name,
            'bank_account_number' => $request->bank_account_number,
            'adhar_number' => $request->adhar_number,
             'address' => $request->address,
           
          
        ]);

        session()->flash('status', 'Created successfully');
        return redirect()->route('vendor.index');
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
    public function edit(Vendor $vendor)
    {
        return view('auth.master.vendor.edit')->with('vendor', $vendor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVendorRequest $request, Vendor $vendor)
    {
        $data = $request->only(['name', 'mob', 'email', 'business_type_id', 'gstin_number', 'pan_number', 'ifc_code', 'bank_name', 'bank_account_number', 'adhar_number', 'address']);
        $vendor->update($data);
        session()->flash('status', 'Updated successfully');
        return redirect()->route('vendor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        
        $vendor->delete();
        session()->flash('status', 'Deleted successfully');
        return redirect()->route('vendor.index');
    }
    public function restore( $id)
    {
        // DB::table('viewuser')->where('id', '=', $id )->delete();
        $vendor = Vendor::withTrashed()->where('id', $id)->first();
        if (!$vendor) {
            return 'User Does Not Exixt!';
        }
        else
        {

        $vendor ->restore();

        session()->flash('status', ' Record Restored successfully');
        return redirect()->route('vendor.index');
    }

    }

}
