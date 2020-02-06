<?php

namespace App\Http\Controllers;


use App\ViewUser;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ExampleController extends Controller
{
    public function restore( $id)
    {
        // DB::table('viewuser')->where('id', '=', $id )->delete();
        $id = ViewUser::find( $id );
        $id ->restore();

        session()->flash('status', ' Record Restored successfully');
        return redirect()->route('ViewUser.index');

    }

}
