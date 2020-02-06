@extends('layouts.layout')

@section('customcss')
<link rel="stylesheet" href="{{ asset('customAssets/css/style.css') }}">
@endsection

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
              <h3 class="box-title">Add Attendance</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form method="POST" action="{{ route('attee.update', $attendance->id) }}"   enctype="multipart/form-data">
              @csrf
               @method('PUT')
              <div style="display:none;">
              
            </div>             
             <div class="box-body">
                <div class="form-group">
                 <input type="hidden" name="employee_id" value="{{ $attendance->employee_id }}">
                  <h4>{{ $attendance->first_name }}   {{ $attendance->last_name}}</h4>
                  <div class="input text">

                    <input name="date" class="form-control boostrap-timetracker" placeholder="Name"   type="date" value="{{ $attendance->date }}">
                     <input name="out_time" class="form-control boostrap-timetracker" placeholder="Name"   type="text" value="<?php
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( ' h:i:s A', time () );
echo $currentTime;
?>" />
                  </div>               
                 </div>
                <p style="color:red">@error('in_time') {{$message}} @enderror</p>
               
              
              
                
              </div>
              <!-- /.box-body -->
            <div class="box-footer">
            <div class="submit">
            
                <button type="submit" class="btn btn-primary ">Add Attendance</button>
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
   
