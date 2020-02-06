@extends('layouts.layout')
@section('content')
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase Master</li>
              <li class="breadcrumb-item active">Purchase Order</li>
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
              <h3 class="card-title">Invoice</h3>
              <a href="{{ route('invoice.create') }}" class="pull-right btn btn-success">+ Add Invoice</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               @if($invoice->count() > 0)
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Vendor Name</th>
                  <th>Invoice No.</th>
                  <th>Payment Mode</th>
                  <th>Challan No.</th>
                  <!-- <th>Net Amount.</th>
                  <th>Remaining Amount</th> -->
                  <th>Invoice Status</th>
                  <th>Invoice Date</th>
              <!--     <th>Remark</th> -->
                  <th>Action</th>
               
                  
                </tr>
                </thead>
                <tbody>
                @foreach ($invoice as $key => $n)
                <tr>
                 
                  <td>{{ $n->vendor_id }}</td>
                  <td>{{ $n-> invoice_number }} </td>
                  <td>{{ $n->payment_mode }}</td>
                  <td> {{ $n->challan_number}}</td>
                  <td>{{ $n->invoice_status_id }}</td>
                  <td>{{  $n-> invoice_date}}</td>
               
                  <td>
                    @if ( $n->trashed() )
                     <form action="invoice/restore/{{ $n->id }} " method="POST">
                                    @csrf
                      <button class="btn btn-Success btn-sm" type="submit" style="background: #28a745;color: white;">Restore</button>
                    </form>
                    @else

                     <form action="{{ route('invoice.destroy', $n->id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                   <!--  <a href="{{ route('invoice.edit', $n->id) }}"
                                        class="btn btn-info btn-sm"><i class='fas fa-edit'></i></a>&nbsp; -->
                                    <button class="btn btn-danger btn-sm" type="submit"><i class='fa fa-trash'></i></button>
                     </form>
                       @endif
                  </td>
                </tr>
                @endforeach
                
                </tfoot>
              </table>
               @else
                    <h3>No Recent Oerders yet! </h3>
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