@extends('layouts.layout')
@section('content')
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Details </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Employee</li>
               <li class="breadcrumb-item active">View Employee</li>
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
              <h3 class="card-title">Employee</h3>
              <a href="{{ route('employee.create') }}" class="pull-right btn btn-success">+ Add Employee</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               @if($employees->count() > 0)
              <table id="example1" class="table table-responsive table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Mobile Number</th>
                  <th>Branch Name</th>
                  <th>Salary</th>
                  <th>Profile</th>
                  <th>Aadhar Number</th>
                  <th>Address</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                @foreach ($employees as $key => $n)
                <tr>
                 
                  <td>{{ $n->first_name }}</td>
                  <td>{{ $n->last_name }} </td>
                  <td>{{ $n->email }}</td>
                  <td> {{ $n->mob}}</td>
                  <td>{{ $n->branch_id }}</td>
                  <td>{{  $n->salary}}</td>
                  <td>  <img src="{{  asset('storage/' .$n->file)  }}" style="width: 50px; height: 50px;"></td>
                  <td>{{ $n->aadhar_no }}</td>
                  <td>{{  $n-> address}}</td>
                  
                  <td>
                      @if ( $n->trashed() )

                     <form action="emp/restore/{{ $n->employee_id }} " method="POST">
                      @csrf
                      <button class="btn btn-Success btn-sm" type="submit" style="background: #28a745;
                       color: white;">Restore</button>
                    </form>

                    @else

                     <form action="{{ route('employee.destroy', $n->employee_id) }}" method="POST">
                      @csrf
                      @method("DELETE")
                      <a href="{{ route('employee.edit', $n->employee_id) }}"
                          class="btn btn-info btn-sm"><i class='fas fa-edit'></i>
                        </a>&nbsp;
                      <button class="btn btn-danger btn-sm" type="submit"><i class='fa fa-trash'></i></button>
                    </form>

                    @endif

                  </td>
                </tr>
                @endforeach
                
                </tfoot>
              </table>
               @else
                    <h3>No Recent Entries yet! </h3>
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