@extends('layouts.layout')


@section('content')
  

    <section class="content-header">
      <h1>Add Employee</h1>
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
              <h3 class="box-title">Add Employee</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('employee.store') }}"   enctype="multipart/form-data">
              @csrf
               @method('POST')
              <div style="display:none;">
              
            </div>             
             <div class="box-body">
                <div class="form-group">
                  <label> First Name</label>
                  <div class="input text">
                    <input name="first_name" class="form-control" placeholder="Name"  maxlength="150" type="text" id="VendorName"/>
                  </div>               
                 </div>
                <p style="color:red">@error('first_name') {{$message}} @enderror</p>
                 <div class="form-group">
                  <label> Last Name</label>
                  <div class="input text">
                    <input name="last_name" class="form-control" placeholder="Name"  maxlength="150" type="text" id="VendorName"/>
                  </div>               
                 </div>
                 <p style="color:red">@error('last_name') {{$message}} @enderror</p>
                 <div class="form-group">
                  <label>Email</label>
                  <div class="input text"><input name="email" class="form-control" placeholder="Email" maxlength="255" type="text" id="VendorEmail"/></div>              
                    </div>
                       <p style="color:red">@error('email') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>Mobile No</label>
                  <div class="input text">
                    <input name="mob" class="form-control" placeholder="Mobile No"  maxlength="10" type="text" id="VendorMob"/>
                  </div>             
               </div>
                <p style="color:red">@error('mob') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>Branch Name</label>
                  <div class="input select">
                    <select name="branch_id" class="form-control total" id="VendorBusinessTypeId">
                      @foreach($data as $n)
                      <option value="{{ $n->id }}">{{ $n->name }}</option>
                      @endforeach
                      </select>
                  </div>                
                </div>
                <p style="color:red">@error('branch_id') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>Salary</label>
                  <div class="input text">
                    <input name="salary" class="form-control" placeholder="Salary"   type="text" />
                  </div>               
                </div>
                <p style="color:red">@error('salary') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>Profile Image</label>
                  <div class="input text">
                    <input name="file" class="form-control"   type="file" />
                  </div>               
                </div>
                <p style="color:red">@error('pan_number') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>Aadhar No.</label>
                  <div class="input text">
                    <input name="aadhar_no" class="form-control" placeholder="Aadhar No"   type="text" />
                  </div>               
                </div>
                <p style="color:red">@error('aadhar_no') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>Address</label>
                  <div class="input text">
                    <input name="address" class="form-control" placeholder="Address"  type="text" />
                  </div>               
                   </div>
                <p style="color:red">@error('address') {{$message}} @enderror</p>

              
              
                
              </div>
              <!-- /.box-body -->
            <div class="box-footer">
            <div class="submit">
            
                <button type="submit" class="btn btn-primary ">Add Employee</button>
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
   
