@extends('layouts.layout')
@section('content')
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Order</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sell Master</li>
              <li class="breadcrumb-item active">View Orders</li>
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

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Search</h3>

              <a href="{{ route('sell.create') }}" class="pull-right btn btn-success">+ Create Order</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               @if($sell_data->count() > 0)
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                    <th>Date</th>

                  <th>Total</th>
                  <th>Adjustment</th>
                  <th>Adjustment Remark</th>
                  <th>Invoice</th>
                  
                 
                  
                </tr>
                </thead>
                <tbody>
                @foreach ($sell_data as $key => $n)
                <tr>
                 
                  <td>{{ $n->created_at }}</td>
                  <td>{{ $n->total }} </td>
                  <td> {{ $n->adjustment}}</td>
                  <td>{{ $n->adjustment_remark }}</td>
                  <td><a href="{{ route('sell.show', $n->id) }}">View Invoice</a></td>
                 
                </tr>
                @endforeach
                
                </tfoot>
              </table>
               @else
                    <h3>No Recent Activities yet! </h3>
                    @endif
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