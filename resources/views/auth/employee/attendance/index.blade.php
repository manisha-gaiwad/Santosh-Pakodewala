@extends('layouts.layout')
@section('customcss')
 <style type="text/css">
    .btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
    box-shadow: none;
    border-radius: 3px;
    padding: 4px 19px 5px;
}
 </style>
@endsection
@section('content')

 
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Employee Attendance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Employee</li>
              <li class="breadcrumb-item active">Employee Attendance</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row"> 
        <div class="col-12">
         
          <!-- /.card -->
           
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                      @if (session('warning'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('warning') }}
                    </div>
                    @endif


          <div class="card">
             <div class="card-header">
              <h3 class="card-title">Employee</h3>
              <a href="{{ route('attee.create') }}" class="pull-right btn btn-success">+ Add Attendance</a>
            </div>
           <!--  <div class="card-header">
              <h3 class="card-title">Search By Date</h3><br>
              <div class="row">
                <div class="col-md-12">
                <div class="boostrap-timetracker">
                <div class="form-group">

                  <label>Date</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calender "></i>
                    </div>
                    <div class="input text">
                      <input type="" name="" class="form-control pull-right" value="<?php echo(date('d/m/Y')) ?>">
                    </div>
                    
                  </div>
                  
                </div>
              </div>
                </div>
              </div>
            
              <a href="" class="btn btn-primary">Search</a>
            </div> -->
            <!-- /.card-header -->
            <div class="card-body">
              
              <table id="example1" class="table  table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Employee Name</th>
                  <th>Mobile No.</th>
                  <th>Email</th>
                  <th>Profile</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($a_data as $data)
                <tr>
                 
                  <td>{{ $data->first_name }}   {{ $data->last_name}}</td>
                  <td>{{ $data->mob }}   </td>
                  <td>{{ $data->email }}</td>
                  <td><img src="{{  asset('storage/' .$data->file)  }}" style="width: 50px; height: 50px;"></td>
                 
                  <td>
                    <a href="/attendance/show/{{$data->employee_id }} " class="btn btn-info">View Attendance</a>
                   
                  </td>
               </tr>
                
                
                </tbody>
                @endforeach
              </table>
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
@endsection

