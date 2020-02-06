@extends('layouts.layout')
@section('content')
   
    <section class="content-header">
      <h1>Add Item</h1>
    </section>
<p class="login-box-msg"></p>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Item</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('item.store') }}" id="VendorAddVendorForm"  enctype="multipart/form-data">
              @csrf
               @method('POST')
              <div style="display:none;">
              
            </div>             
             <div class="box-body">
                <div class="form-group">
                  <label>Item Name</label>
                  <div class="input text">
                    <input name="name" class="form-control" placeholder="Name"  maxlength="150" type="text" id="VendorName"/>
                  </div>               
                 </div>
                    <p style="color:red">@error('name') {{$message}} @enderror</p>
                <div class="form-group">
                  <label>Quantity</label>
                  <div class="input text"><input name="quantity" class="form-control" placeholder="Quantity"  maxlength="10" type="text" id="quantity"/></div>             
                     </div>
                        <p style="color:red">@error('quantity') {{$message}} @enderror</p>


                <div class="form-group">
                  <label>Unit</label>
                  <div class="input select">
                    <select name="unit_id" class="form-control total" id="VendorBusinessTypeId">
                        @foreach ($data as $key => $n)
                      <option value="{{ $n->unit }}">{{ $n->unit }}</option>
                       @endforeach
                      </select>
                    </div>               
               </div>
              <p style="color:red">@error('unit_id') {{$message}} @enderror</p>
                   
                
                <div class="form-group">
                  <label>Price</label>
                  <div class="input text">
                    <input name="price" class="form-control" placeholder="Price"  maxlength="255" type="text" id="price"/>
                  </div>               
                   </div>
                      <p style="color:red">@error('price') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>Total</label>
                  <div class="input text">
                    <input name="total" class="form-control" placeholder="Total"  maxlength="255" type="text" id="total" value="">
                  </div>               
                   </div>
                   

               

               
              <!-- /.box-body -->
            <div class="box-footer">
            <div class="submit">
            
                <button type="submit" class="btn btn-primary ">Add Item</button>
            </div>          
              </div>
            </form>
          </div>
      </div>
        <!--/.col (left) -->
    
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection

@section('customscripts')   

<script type="text/javascript">

  $(document).on('change', '#price', function (e) {
        let target = e.target;

        var totalamt = parseFloat($('#quantity').val())

        var paidamt = parseFloat($('#price').val())
        penamt = totalamt * paidamt;
        $('#total').val(penamt)

    }) 


</script>
@endsection
