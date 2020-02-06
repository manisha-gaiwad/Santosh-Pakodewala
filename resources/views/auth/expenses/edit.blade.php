@extends('layouts.layout')
@section('content')
  
   <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <section class="content-header">
      <h1>Add Vendor</h1>
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
              <h3 class="box-title">Add Vendor</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('expenses.update', $expenses->id) }}"  enctype="multipart/form-data">
              @csrf
               @method('PUT')
                          
             <div class="box-body">
                 <div class="form-group">
                  <label>Date</label>
                   <div class="input text">
                  <input type="date" class="form-control" name="date" value="{{ $expenses->date }}">
                </div>
                </div>
                <div class="form-group">
                  <label>Branch Name</label>
                  <div class="input select">
                    <select name="branch_id" class="form-control total" >
                      
                     
                      <option value="{{ $expenses->branch_id }}">{{ $expenses->branch_id }}</option>
                 
                      </select>
                    </div>                
                  </div>
                   <p style="color:red">@error('branch_id') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>Item Name</label>
                   <div class="input text">
                    <input name="item_details" class="form-control" placeholder="Item Name"   type="text" value="{{ $expenses->item_details }}" />
                  </div>             
                     </div>
                        <p style="color:red">@error('item_details') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>Quantity</label>
                  <div class="input text">
                    <input name="quantity" class="form-control newquantity" placeholder="Quantity"  type="text" value="{{ $expenses->quantity }}" /></div>              
                    </div>
                       <p style="color:red">@error('quantity') {{$message}} @enderror</p>
                  <div class="form-group">
                  <label>Price</label>
                  <div class="input text">
                    <input name="price" class="form-control newrate" placeholder="Price"  type="text" value="{{ $expenses->price }}" />
                  </div>              
                    </div>
                  <p style="color:red">@error('price') {{$message}} @enderror</p>

                 <div class="form-group">
                  <label>Total Price</label>
                  <div class="input text">
                    <input name="total_price" class="form-control newproductPrice" placeholder="Total Price"  type="text" value="{{ $expenses->price }}">
                  </div>              
                </div>
                  <p style="color:red">@error('total_price') {{$message}} @enderror</p>


                <div class="form-group">
                  <label>Unit</label>
                  <div class="input select">
                    <select name="unit_id" class="form-control total" >
                   
                      <option value="{{ $expenses->unit_id }}">{{ $expenses->unit_id }}</option>
                      
                      </select>
                    </div>                
                    </div>
                    <p style="color:red">@error('unit_id') {{$message}} @enderror</p>
                
              </div>
              <!-- /.box-body -->
            <div class="box-footer">
            <div class="submit">
            
                <button type="submit" class="btn btn-primary ">Update Expenses</button>
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
   
