<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;


class Employee extends Model
{
	
     use SoftDeletes;
    protected $softDelete = true;
    protected $primaryKey  = 'employee_id';
	protected $table = 'employees';
    protected $fillable = ['first_name','last_name', 'email', 'mob', 'branch_id', 'salary', 'file', 'aadhar_no', 'address'];
    public function deleteFile()
    {
        Storage::delete($this->file);
    }

   
}
