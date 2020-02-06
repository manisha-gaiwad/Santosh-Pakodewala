@extends('layouts.layout')
@section('content')
   

    <section class="content-header">
      <h1>Add Unit</h1>
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
              <h3 class="box-title">Add Units</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('unit.store') }}" id="VendorAddVendorForm"  enctype="multipart/form-data">
              @csrf
               @method('POST')
              <div style="display:none;">
              
            </div>             
             <div class="box-body">
                <div class="form-group">
                  <label>Unit</label>
                  <div class="input text">
                    <input name="unit" class="form-control" placeholder="Unit"  maxlength="150" type="text" id="UnitName"/>
                  </div>               
                 </div>
                    <p style="color:red">@error('unit') {{$message}} @enderror</p>
             
                   

               

               
              <!-- /.box-body -->
            <div class="box-footer">
            <div class="submit">
            
                <button type="submit" class="btn btn-primary ">Add Unit</button>
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
   
