@extends('layouts.layout')
@section('content')
  
    <section class="content-header">
      <h1>Edit Branch Details</h1>
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
              <h3 class="box-title">Edit Branch Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('branch.update', $branch->id) }}" id="VendorAddVendorForm"  enctype="multipart/form-data">
              @csrf
               @method('PUT')
              <div style="display:none;">
              
            </div>             
             <div class="box-body">
                <div class="form-group">
                  <label>Branch Name</label>
                  <div class="input text">
                    <input name="name" class="form-control" placeholder="Name"  maxlength="150" type="text" id="VendorName" value="{{ $branch->name }}" />
                  </div>               
                     </div>
                      <p style="color:red">@error('name') {{$message}} @enderror</p>

                      <div class="form-group">
                  <label>Address</label>
                  <div class="input text">
                    <input name="address" class="form-control" placeholder="Address" maxlength="255" type="text" id="VendorEmail"/ value="{{ $branch->address }}" >
                  </div>              
                    </div>
                      <p style="color:red">@error('address') {{$message}} @enderror</p>
                <div class="form-group">
                  <label>Mobile No</label>
                  <div class="input text">
                    <input name="mob" class="form-control" placeholder="Mobile No" required="required" maxlength="10" type="text" id="VendorMob" value="{{ $branch->mob }}" />
                  </div>             
                     </div>
                      <p style="color:red">@error('mob') {{$message}} @enderror</p>

                

                
              </div>
              <!-- /.box-body -->
            <div class="box-footer">
            <div class="submit">
            
                <button type="submit" class="btn btn-primary ">Update Branch</button>
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
   
