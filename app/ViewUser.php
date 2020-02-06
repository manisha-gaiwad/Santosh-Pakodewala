<?php

namespace App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ViewUser extends Model
{
     
     use SoftDeletes;
     protected $softDelete = true;
     protected $table = 'viewuser';
     protected $primaryKey = 'id';
     protected $fillable = ['branch_name','first_name', 'last_name', 'email', 'username', 'password', 'role'];


    public function deleteFile()
    {
        Storage::delete($this->image); 
    }

}
