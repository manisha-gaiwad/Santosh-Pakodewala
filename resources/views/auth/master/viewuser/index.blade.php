@extends('layouts.layout')
@section('content')
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Master</li>
              <li class="breadcrumb-item active">Users</li>
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
              <h3 class="card-title">Users</h3>
              <a href="{{ route('ViewUser.create') }}" class="pull-right btn btn-success">+ Add user</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               @if($users->count() > 0)
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Branch Name</th>
                  <th> Name</th>
                 
                  <th>Email</th>
                  <th>Username</th>
                  <th>UserType</th>
                  
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $key => $n)
                <tr>
                 
                  <td>{{ $n->branch_name }}</td>
                  <td>{{ $n->name }} </td>
               
                  <td> {{ $n->email}}</td>
                  <td>{{ $n->username }}</td>
                  <td>{{  $n->role}}</td>
                 
                 
                  
                  <td>
                    @if ( $n->trashed() )
                     <form action="ViewUser/restore/{{ $n->id }} " method="POST">
                                    @csrf
                      <button class="btn btn-Success btn-sm" type="submit" style="background: #28a745;color: white;">Restore</button>
                    </form>
                    @else

                 
                     <form action="{{ route('ViewUser.destroy', $n->id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <a href="{{ route('ViewUser.edit', $n->id) }}"
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