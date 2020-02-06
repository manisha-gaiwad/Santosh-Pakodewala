<?php

namespace App\Http\Controllers;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::withTrashed()->get();
        return view('auth.employee.view.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

         $data = DB::table('branches')->get();

        return view('auth.employee.view.create', ['data' => $data]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmployeeRequest $request)
    {
        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mob' => $request->mob,
            'branch_id' => $request->branch_id,
            'salary' => $request->salary,
            'file' => $this->StoreFile($request),
            'aadhar_no' => $request->aadhar_no,
            'address' => $request->address
        ]);

        session()->flash('status', 'Created successfully');
        return redirect()->route('employee.index');
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
    public function edit(Employee $employee)
    {
        // $employee = \App\Employee::findOrFail($id);
         return view('auth.employee.view.edit')->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, $id)
    {
        
        $data = $request->only(['first_name', 'last_name', 'email', 'mob', 'branch_id', 'salary', 'file', 'aadhar_no', 'address']);
         if ($request->hasFile('file'))
        {
            $file = $this->StoreFile($request);
            $employee = \App\Employee::findOrFail($id);
            $employee->deleteFile();
            $data['file'] = $file;
        }

        DB::table('employees')
            ->where('employee_id', $id)
            ->update($data);
     session()->flash('status', 'Updated successfully');
        
       
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    { 
        // DB::table('employees')->where('employee_id', '=', $id )->delete();
        $employee->delete();

        session()->flash('status', ' Record Deleted successfully');
        return redirect()->route('employee.index');
    }

     //handle the file storage request
    private function StoreFile($request)
    {
        //if request has file
        if ($request->hasFile('file')) {
            //storing file
            return $file = $request->file('file')->store('Employee', 'public');
        }
    }


      public function restore( $id)
    {
        // DB::table('viewuser')->where('id', '=', $id )->delete();
        $employee = Employee::withTrashed()->where('employee_id', $id)->first();
        if (!$employee) {
            return 'Item Does Not Exixt!';
        }
        else
        {

        $employee ->restore();

        session()->flash('status', ' Record Restored successfully');
        return redirect()->route('employee.index');
    }

    }
}
