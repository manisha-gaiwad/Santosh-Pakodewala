<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class ViewUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::withTrashed()->get();
        return view('auth.master.viewuser.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branch_data = DB::table('branches')->get();
         return view('auth.master.viewuser.create')->with('branch_data', $branch_data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
         User::create([
            'branch_name' => $request->branch_name,
            'name' => $request->name,
            'email' =>$request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role  
                  
        ]);

        session()->flash('status', ' User Created successfully');
        return redirect()->route('ViewUser.index');
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
         $viewuser = \App\User::findOrFail($id);
         $branch_data = DB::table('branches')->get();
         return view('auth.master.viewuser.edit', ['viewuser' => $viewuser, 'branch_data' => $branch_data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request,  $id) 
    {
       
        
    $data = $request->only(['branch_name', 'name',  'email','role']);
        //  if ($request->hasFile('image'))
        // {
        //     $file = $this->StoreFile($request);
        //     $viewuser = \App\User::findOrFail($id);
        //     $viewuser->deleteFile();
        //     $data['image'] = $file;
        // }

        DB::table('viewuser')
            ->where('id', $id)
            ->update($data);
        
  
             session()->flash('status', 'Updated successfully');
        
       
        return redirect()->route('ViewUser.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        // DB::table('viewuser')->where('id', '=', $id )->delete();
        $id = User::find( $id );
        $id ->delete();

        session()->flash('status', ' Record Deleted successfully');
        return redirect()->route('ViewUser.index');

    }

    //handle the file storage request
    private function StoreFile($request)
    {
        //if request has file
        if ($request->hasFile('image')) {
            //storing file
            return $file = $request->file('image')->store('UserProfile', 'public');
        }
    }

    
    public function restore( $id)
    {
        
        $user = User::withTrashed()->where('id', $id)->first();
        if (!$user) {
            return 'User Does Not Exist!';
        }
        else
        {

        $user ->restore();

        session()->flash('status', ' Record Restored successfully');
        return redirect()->route('ViewUser.index');
    }

    }

    
}
