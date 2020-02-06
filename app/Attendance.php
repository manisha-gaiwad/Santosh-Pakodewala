<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Attendance extends Model
{
     
     use SoftDeletes;
     protected $primary_key = 'attendance_id';
     protected $softDelete = true;
     protected $table='employee_attendance';
      protected $fillable = ['employee_id','date', 'in_time', 'out_time'];

       
}
