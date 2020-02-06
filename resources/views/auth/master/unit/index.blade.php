@extends('layouts.layout')
@section('content')
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Unit Master</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Master</li>
              <li class="breadcrumb-item active">Unit</li>
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
              <h3 class="card-title">Units</h3>
              <a href="{{ route('unit.create') }}" class="pull-right btn btn-success">+ Add Unit</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               @if($units->count() > 0)
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Name</th>
                  <th>Action</th>
                  
                  
                </tr>
                </thead>
                <tbody>
                @foreach ($units as $key => $n)
                <tr>
                 
                  <td>{{ $n->unit }}</td>
                
                  <td>
                      @if ( $n->trashed() )
                     <form action="unit/restore/{{ $n->unit_id }}" method="POST">
                                    @csrf
                                     
                      <button class="btn btn-Success btn-sm" type="submit" style="background: #28a745;color: white;">Restore</button>
                    </form>
                    @else

                     <form action="{{ route('unit.destroy', $n->unit_id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                   
                                    <button class="btn btn-danger btn-sm" type="submit"><i class='fa fa-trash'></i></button>
                    </form>
                      @endif 
                  </td>
                </tr>
                @endforeach
                
                </tfoot>
              </table>
               @else
                    <h3>No Recent Units yet! </h3>
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