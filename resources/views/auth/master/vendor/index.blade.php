@extends('layouts.layout')
@section('content')
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vandor Master</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Master</li>
              <li class="breadcrumb-item active">Vendor Master</li>
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
              <h3 class="card-title">Vandors</h3>
              <a href="{{ route('vendor.create') }}" class="pull-right btn btn-success">+ Add Vendor</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               @if($vendors->count() > 0)
              <table id="example1" class="table table-bordered table-responsive table-striped">
                <thead>
                <tr>
                  
                  <th>Name</th>
                  <th>Mobile No</th>
                  <th>Email</th>
                  <th>Vendor Business Type</th>
                  <th>GST No</th>
                  <th>PAN No</th>
                  <th>IFC NO</th>
                  <th>Bank Name</th>
                  <th>Bank Account Number</th>
                  <th>Adhar Number</th>
                  <th>Address</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                @foreach ($vendors as $key => $n)
                <tr>
                 
                  <td>{{ $n->name }}</td>
                  <td>{{ $n->mob }} </td>
                  <td>{{ $n->email }}</td>
                  <td> {{ $n->business_type_id}}</td>
                  <td>{{ $n->gstin_number }}</td>
                  <td>{{  $n->pan_number}}</td>
                  <td>{{ $n->ifc_code }}</td>
                  <td>{{ $n->bank_name }}</td>
                  <td>{{  $n-> bank_account_number}}</td>
                  <td>{{ $n->adhar_number }}</td>
                  <td>{{  $n->address}}</td>
                  <td>
                    @if ( $n->trashed() )
                     <form action="vendor/restore/{{ $n->id }} " method="POST">
                                    @csrf
                      <button class="btn btn-Success btn-sm" type="submit" style="background: #28a745;color: white;">Restore</button>
                    </form>
                    @else
                     <form action="{{ route('vendor.destroy', $n->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <a href="{{ route('vendor.edit', $n->id) }}"
                            class="btn btn-info btn-sm"><i class='fas fa-edit'></i></a>&nbsp;
                        <button class="btn btn-danger btn-sm" type="submit"><i class='fa fa-trash'></i></button>
                    </form>
                    @endif
                  </td>
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