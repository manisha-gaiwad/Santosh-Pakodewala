@extends('layouts.layout')
@section('content')
  
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Item Master</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sell Master</li>
              <li class="breadcrumb-item active">Items</li>
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
              <h3 class="card-title">Item</h3>
              <!-- <a href="{{ route('item.create') }}" class="pull-right btn btn-success"></a> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
             <!--   @if($item_data->count() > 0) -->
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Item Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                 
                </tr>
                </thead>
                <tbody>
                 @foreach ($item_data as $key => $n)
                <tr>
                  <td>{{ $n->name }}</td>
                  <td> {{ $n->price }}</td>
                  <td><span class="badge bg-red">  {{  $n->quantity }} </span></td>
                
                </tr>
                @endforeach
               
              </table>
             <!--    @else
                    <h3>No Recent Items yet! </h3> -->
                    <!-- @endif -->
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