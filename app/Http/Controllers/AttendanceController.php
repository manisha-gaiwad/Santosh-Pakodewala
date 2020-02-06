<?php

namespace App\Http\Controllers;
use App\Attendance;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateAttendanceRequest;  
use Illuminate\Support\Facades\Input;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

       $a_data = DB::table('employee_attendance')
       ->rightJoin('employees', 'employee_attendance.employee_id', '=', 'employees.employee_id')
       ->get();
     return view('auth.employee.attendance.index', compact('a_data'));


    
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        
        $data = DB::table('employees')->get();
     return view('auth.employee.attendance.create', compact('data'));
     
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAttendanceRequest $request)
    {   
         if (Attendance::where('employee_id', Input::get('employee_id'))->exists() and Attendance::where('date', Input::get('date'))->exists() ) 
         {
          session()->flash('warning', ' Sorry Attendance Already Exist ');
            return view('auth.employee.attendance.index');
         }
         else
            {    
                $attendance= new \App\Attendance();
               $id = $attendance->employee_id = request('employee_id');
                $attendance->date = request('date');
                $attendance->in_time = request('in_time');
                $attendance->save();
                 
                if($attendance)
                {
                   
                    session()->flash('status', 'Created successfully');
                    return redirect('/attendance/show/'.$id);
                }
            }
        

        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
        $attendance = DB::table('employee_attendance')
       ->rightJoin('employees', 'employee_attendance.employee_id', '=', 'employees.employee_id')
       ->where('employees.employee_id', $id)
       ->get();
       
        return view('auth.employee.attendance.show')->with('attendance', $attendance);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $attendance = DB::table('employee_attendance')
       ->rightJoin('employees', 'employee_attendance.employee_id', '=', 'employees.employee_id')
       ->where('employees.employee_id', $id)->whereNull('employee_attendance.out_time')
       ->first();
         return view('auth.employee.attendance.edit')->with('attendance', $attendance);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateAttendanceRequest $request,  $id)
    {
       if (Attendance::where('employee_id', Input::get('employee_id'))->exists() 
            and Attendance::where('date', Input::get('date'))->exists() 
            and Attendance::where('out_time', Input::get('out_time'))->exists() ) 
         {
          session()->flash('warning', ' Sorry Attendance Already Exist ');
            return view('auth.employee.attendance.index');
         }
         else
         {
            $attendance=  \App\Attendance::findOrFail($id);
       $employee_id = $attendance->employee_id = request('employee_id');
        $attendance->out_time = request('out_time');
    
        $attendance->update();
        if (!$attendance) {
        session()->flash('warning', 'Sorry Something Went wrong ');
        return redirect()->route('/attendance/show/'.$employee_id);
        }
        else
        {
            session()->flash('status', 'Updated successfully');
        return redirect('/attendance/show/'.$employee_id);
        }


         }

    }
        
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }

    
    public function calculate()
    {
        $a_data = DB::table('employee_attendance')
       ->rightJoin('employees', 'employee_attendance.employee_id', '=', 'employees.employee_id')
       ->get();

       return view('auth.employee.attendance.show')->with('a_data', $a_data);
    }
}
