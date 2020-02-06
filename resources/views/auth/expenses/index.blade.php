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
            <h1>View Exepenses </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Exepenses</li>
              <li class="breadcrumb-item active">View Exepenses</li>
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
              <h3 class="card-title">Search By Date</h3><br>
              <div class="row">
                <div class="col-md-12">
                  <form>
                 <div class="form-group">
                  <label>Select Branch </label>
                  <div class="input select">
                    <select name="branch_id" class="form-control total" >
                      
                      <option value=""></option>
                 
                      </select>
                    </div>                
                  </div>
                   <p style="color:red">@error('branch_id') {{$message}} @enderror</p>
                <div class="boostrap-timetracker">
                <div class="form-group">

                  <label>From Date</label>
                  <div class=" date">
                   
                    <div class="input text">
                      <input type="date" name="" class="form-control pull-right">
                    </div>
                    
                  </div>
                </div>
              </div>
               <div class="boostrap-timetracker">
                <div class="form-group">
                   <label>To Date</label>
                  <div class=" date">
                 
                    <div class="input text">
                      <input type="date" name="" class="form-control pull-right">
                    </div>
                    
                  </div>
                  <div class="box-footer">
               
              </div>
                  
                </div>
              </div>
                    </form>
              
                </div>
              </div>
            <br>
              <a href="" class="btn btn-primary">Search</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               @if($expenses->count() > 0)
              <table id="example1" class="table  table-bordered table-striped">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Branch ID</th>
                  <th>Item Name</th>
                  <th>Quantity</th>
                  <th> Price</th>
                  <th>Total Price</th>
                  <th>Action</th>
                
                  
                </tr>
                </thead>
                <tbody>
                @foreach ($expenses as $key => $n)
                <tr>
                 
                  <td>{{ $n->date }}</td>
                   <td> {{ $n->branch_id}}</td>
                   <td> {{ $n->item_details}}</td>
                   <td> {{ $n->quantity}}</td>
                   <td> {{ $n->price}}</td>
                  <td> {{ $n->total_price}}</td>
                  
                  <td>
                     @if ( $n->trashed() )
                     <form action="expenses/restore/{{ $n->id }} " method="POST">
                                    @csrf
                      <button class="btn btn-Success btn-sm" type="submit" style="background: #28a745;color: white;">Restore</button>
                    </form>
                    @else

                   <form action="{{ route('expenses.destroy', $n->id) }}" method="POST">
                      @csrf
                      @method("DELETE")
                      <a href="{{ route('expenses.edit', $n->id) }}"class="btn btn-info btn-sm"><i class='fas fa-edit'></i>
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
                    <h3>No Recent Entry yet! </h3>
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