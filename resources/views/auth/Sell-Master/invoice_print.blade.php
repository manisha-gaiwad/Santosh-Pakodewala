@extends('layouts.layout')
@section('content')
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sales Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
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
           
                   

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Print Invoice</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               
              
               
                  
                 
               
                  {{ $sell_data->item_name }}
                  {{ $n->quantity }} 
                   {{ $n->price}}
                  {{ $n->total_price }}
                  <a href="">Print</a>
                 
              
                
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