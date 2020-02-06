@extends('layouts.layout')
@section('content')
  
    <section class="content-header">
      <h1>Add User</h1>
    </section>
<p class="login-box-msg"></p>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('ViewUser.store') }}"   enctype="multipart/form-data">
              @csrf
               @method('POST')
                    
             <div class="box-body">
                <div class="form-group">
                  <label>Select Branch</label>
                  <div class="input text">
                   
                    <select name="branch_name" class="form-control">
                      <option>----SELECT BRANCH ----</option>
                      @foreach($branch_data as $data)
                      <option value="{{ $data->name }}">{{ $data->name }}</option>

                      @endforeach
                    </select>
                  </div>               
               </div>
               <p style="color:red">@error('name') {{$message}} @enderror</p>
               
               <div class="form-group">
                    <label> Name </label>
                    <div class="input text">
                      <input name="name" class="form-control" placeholder="Name" type="text" />
                    </div>               
               </div>
               <p style="color:red">@error('name') {{$message}} @enderror</p>
               
               
               <div class="form-group">
                    <label>Email</label>
                    <div class="input text">
                      <input type="email" name="email" class="form-control" placeholder="Email" maxlength="255" type="text" />
                    </div>              
               </div>
               <p style="color:red">@error('email') {{$message}} @enderror</p>
               <div class="form-group">
                    <label>Username</label>
                    <div class="input text">
                      <input name="username" class="form-control" placeholder="Username"  maxlength="255" type="text" />
                    </div>               
              </div>
              <p style="color:red">@error('username') {{$message}} @enderror</p>
              <div class="form-group">
                  <label>Password</label>
                  <div class="input text">
                    <input type="password" name="password" class="form-control" placeholder="*******"  maxlength="255" type="text" />
                  </div>               
              </div>
              <p style="color:red">@error('password') {{$message}} @enderror</p>
              <div class="form-group">
                  <label>User Role</label>
                  <div class="input select">
                    <select name="role" class="form-control total" >
                      <option >---Select Role of User---</option>
                      <option value="Admin">Admin</option>
                      <option value="user">User</option>
                     </select>
                  </div>              
               </div>
               <p style="color:red">@error('role') {{$message}} @enderror</p>
                
               

            </div>
              <!-- /.box-body -->
            <div class="box-footer">
              <div class="submit">
                  <button type="submit" class="btn btn-primary ">Add User</button>
              </div>          
            </div>
            </form>
          </div>
      </div>
        <!--/.col (left) -->
    
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection
   
