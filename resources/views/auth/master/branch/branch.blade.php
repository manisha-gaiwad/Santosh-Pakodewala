@extends('layouts.layout')
@section('content')
  
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Branches </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Master</li>
              <li class="breadcrumb-item active">View Branches</li>
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
              <h3 class="card-title">Branches</h3>
              <a href="{{ route('branch.create') }}" class="pull-right btn btn-success">+ Add Branch</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table  table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name of Branch</th>
                  <th>Address</th>
                  <th>Mobile No.</th>
                  <th>Action</th>
                
                </tr>
                </thead>
                <tbody>
                       @foreach ($branches as $key => $n)
                <tr>
                  <td>{{ $n->name }}</td>
                  <td>{{ $n->address }}
                  </td>
                  <td>{{ $n->mob }}</td>
                  <td>  

                       @if ( $n->trashed() )
                     <form action="branch/restore/{{ $n->id }} " method="POST">
                                    @csrf
                      <button class="btn btn-Success btn-sm" type="submit" style="background: #28a745;color: white;">Restore</button>
                    </form>
                    @else

                    <form action="{{ route('branch.destroy', $n->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <a href="{{ route('branch.edit', $n->id) }}"
                            class="btn btn-info btn-sm"><i class='fas fa-edit'></i></a>&nbsp;
                        <button class="btn btn-danger btn-sm" type="submit"><i class='fa fa-trash'></i></button>
                    </form>
                    @endif
                    </td>
                
                </tr>
                @endforeach
               
                </tbody>
              
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