@extends('layouts.layout')
@section('content')
   
   <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <section class="content-header">
      <h1>Add Expenses</h1>
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
              <h3 class="box-title">Add Expenses</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('expenses.store') }}"  enctype="multipart/form-data">
              @csrf
               @method('POST')
              <div style="display:none;">
              
            </div>             
             <div class="box-body">
                 <div class="form-group">
                  <label>Date</label>
                   <div class="input text">
                  <input type="date" class="form-control" name="date" value="<?php date('Y-m-d H:i:s');   ?>">
                </div>
                </div>
                <div class="form-group">
                  <label>Branch Name</label>
                  <div class="input select">
                    <select name="branch_id" class="form-control total" >
                      <option value="">Select Bussiness Type</option>
                      @foreach($branch_data as $n)
                      <option value="{{  $n->id }}">{{ $n->name}}</option>
                      @endforeach
                      </select>
                    </div>                
                  </div>
                   <p style="color:red">@error('branch_id') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>Item Name</label>
                   <div class="input text">
                    <input name="item_details" class="form-control" placeholder="Item Name"  maxlength="10" type="text" id="VendorMob"/></div>             
                     </div>
                        <p style="color:red">@error('item_details') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>Quantity</label>
                  <div class="input text">
                    <input name="quantity" class="form-control newquantity" placeholder="Quantity" maxlength="255" type="text" id="VendorEmail"/></div>              
                    </div>
                       <p style="color:red">@error('quantity') {{$message}} @enderror</p>
                  <div class="form-group">
                  <label>Price</label>
                  <div class="input text">
                    <input name="price" class="form-control newrate" placeholder="Price" maxlength="255" type="text" id="VendorEmail"/>
                  </div>              
                    </div>
                  <p style="color:red">@error('price') {{$message}} @enderror</p>

                 <div class="form-group">
                  <label>Total Price</label>
                  <div class="input text">
                    <input name="total_price" class="form-control newproductPrice" placeholder="Total Price"  type="text" i>
                  </div>              
                </div>
                  <p style="color:red">@error('total_price') {{$message}} @enderror</p>


                <div class="form-group">
                  <label>Unit</label>
                  <div class="input select">
                    <select name="unit_id" class="form-control total" id="VendorBusinessTypeId">
                      <option value="">----Select Unit---</option>
                      @foreach($unit_data as $row)
                      <option value="{{ $row->unit_id }}">{{ $row->unit}}</option>
                      @endforeach
                      </select>
                    </div>                
                    </div>
                    <p style="color:red">@error('unit_id') {{$message}} @enderror</p>
                
              </div>
              <!-- /.box-body -->
            <div class="box-footer">
            <div class="submit">
            
                <button type="submit" class="btn btn-primary ">Add Expenses</button>
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
     <script type="text/javascript">
        $('.newquantity').change(function() {          
          update_amounts();
        });
        $('.newrate').change(function() {          
          update_amounts();
        });
        function update_amounts() {          
          var sum = 0.0;
          $('.newquantity').each(function() {
          var quantity = $(".newquantity").val();
          var rate = $(".newrate").val();
          var amount = (quantity*rate);
          // sum+=amount;
          $(".newproductPrice").val(amount);
            // $(this).find('.amount').text(''+amount);
          });
          //just update the total to sum  
          // $('input.total').val(sum);
        }
  
     </script>
@endsection
   
