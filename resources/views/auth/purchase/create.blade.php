@extends('layouts.layout')

@section('customcss')
<style type="text/css">
  * {font-family: 'Segoe UI';}
th {text-align: left; font-weight: 600;}
table {border-collapse: collapse; border: 1px solid #999; width: 100%;}
table td,
table th {border: 1px solid #ccc;}
table input {max-width: 100%; border: 1px solid #ccc;}
table td:first-child input {width: 50px;}
#master {display: none;}
</style>
@endsection

@section('content')
  

    <section class="content-header">
      <h1>Create Invoice</h1>
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
              <h3 class="box-title">Create Invoice</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('invoice.store') }}"  enctype="multipart/form-data">
             {{ csrf_field() }}
               @method('POST')
              <div style="display:none;">
              <input type="hidden" name="invoice_date" value="<?php echo(date("d/m/Y")) ?>">
            </div>             
             <div class="box-body">
              <div class="form-group">
                <input type="hidden" name="invoice_number" value="<?php echo(rand(10, 30)); ?>">
                <label>Vender Name</label>
                  <div class="input select">
                    <select name="vendor_id" class="form-control total" >
                      @foreach($vendor_data as $n)
                      <option value="{{ $n->id }}">{{ $n->name }}</option>
                      @endforeach
                     
                    </select>
                  </div>                
                </div>
                <p style="color:red">@error('vendor_id') {{$message}} @enderror</p>
                <div class="form-group">
                <label>Payment Mode</label>
                  <div class="input select">
                    <select name="payment_mode" class="form-control total" >
                      <option value="">Select </option>
                      <option value="Cash">Cash</option>
                      <option value="Credit">Credit</option>
                      <option value="Cheque">Cheque</option>
                      <option value="DD">DD</option>
                      <option value="google Pay">google Pay</option>
                      <option value="Net Banking">Net Banking</option> 
                    </select>
                  </div>                
                </div>
                <p style="color:red">@error('payment_mode') {{$message}} @enderror</p>
                <div class="form-group">
                    <label>Invoice Status</label>
                      <div class="input select">
                        <select name="invoice_status_id" class="form-control total" >
                          @foreach($invoice_data as $row)
                          <option value="{{ $row->id}}">{{ $row->status_name }} </option>
                         @endforeach
                        </select>
                      </div>                
                 </div>
                 <p style="color:red">@error('invoice_status_id') {{$message}} @enderror</p>
                 <div class="form-group">
                      <label>Challan No</label>
                      <div class="input text">
                        <input name="challan_number" class="form-control" placeholder="Challan No" type="text" >
                      </div>             
                 </div>
                 <p style="color:red">@error('challan_number') {{$message}} @enderror</p>
                 <div class="form-group">
                      <label>Remark</label>
                      <div class="input text">
                        <input name="remark" class="form-control" placeholder="Remark" type="text" >
                      </div>             
                 </div>
                 <p style="color:red">@error('remark') {{$message}} @enderror</p>
                 <!-- Item table start -->
               <div class="form-group table-responsive">
                  <table  class="table table-condensed-xs">
                    <thead>
                        <tr>
                          <th>Item Name</th>
                          <th>Quantity</th>
                          <th>Rate</th>
                          <th>Total Price</th>
                          <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php for($i = 1; $i <= 1; $i++){ ?>
                      <tr id="master">
                        <!-- <td><input type="text" class="Sl" /></td> -->
                        <td><input name="item_name" type="text" class="Product"  />
                        <p style="color:red">@error('item_name') {{$message}} @enderror</p>
                      </td>
                        <td><input name="quantity" type="text" class="Quantity"  />
                        <p style="color:red">@error('quantity') {{$message}} @enderror</p>
                      </td>
                        <td><input  name="price" type="text" class="Rate"  >
                         <p style="color:red">@error('price') {{$message}} @enderror</p>
                       </td>
                        <td><input  name="total_price" type="text" class="Amount"  >
                         <p style="color:red">@error('total_price') {{$message}} @enderror</p>
                       </td>
                        <td><input type="button" value="&times;" class="del btn btn-danger" /></td>
                      </tr>
                        <?php } ?>
                 </tbody>  
                 <tfoot>
                    <tr>
                      <th>
                        <input type="text" name="net_amount" id="total_amt">  
                     </th>
                      <th>
                          <input name="paid_amount" class="form-control " placeholder="Paid Amount" type="text" id="PaidAmount">
                      </th>
                      <th>
                         <input name="remaining_amount" class="form-control " placeholder="Remaining Amount" type="text" id="paindingAmount" >
                      </th>
                      <input type="hidden" name="status" value="<?php if($_POST['remaining_amount']==0){ echo('COMPLETE');}else{ echo('Pending'); } ?>">
                    </tr>
                  </tfoot>
              </table>
              <input type="button" class="btn  btn-info add-row" value="Add Row" id="add">
          </div>
     <!-- item table End -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="submit">
             <button type="submit" class="btn btn-primary ">Add Invoice</button>
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
  $(function () {

    var max = 2;
  $(".add-row").click(function()
  {
  var markup = '<tr><td><input name="item_name[]" class="Product" placeholder="Iteam Name" type="text" ></td><td><input name="quantity[]" class="Quantity" placeholder="Quantity" type="text" ></td><td><input name="price[]" class="Rate" placeholder="Rate" type="text" ></td><td><input name="total_price[]" class="Amount" placeholder="Tatal Price" type="text" ></td></tr>';
   $(".maxvalue").val(max);
    max++;
    $("table tbody").append(markup);
  });


  // $("#add").click(function () {
  //   $("#master").clone().removeAttr("id").appendTo("tbody");
  // });
  $("table").on("click", ".del", function () {
    $(this).closest("tr").remove();
  });
  $("table").on("input", "input", function () {
    $("tbody tr").each(function () {
      $this = $(this);
      if (this.id != "master")
        $this.find(".Amount").val(+$this.find(".Quantity").val() * +$(this).find(".Rate").val());
      $("#total_amt").val(0);

      $(".Amount").each(function () {
        if (this.value != "")
          $("#total_amt").val(parseInt($("#total_amt").val()) + parseInt($(this).val()));
      });

      // $(".Quantity").each(function () {
      //   if (this.value != "")
      //     $("#total_qty").text(parseInt($("#total_qty").text()) + parseInt($(this).val()));
      // });
    });
  });
});

  // Add row


  


// add row end


// REMAINING AMOUNT CALCULATION

$(document).on('change', '#PaidAmount', function (e) {
        let target = e.target;

        var totalamt = parseFloat($('#total_amt').val())

        var paidamt = parseFloat($('#PaidAmount').val())
        penamt = totalamt - paidamt;
        $('#paindingAmount').val(penamt)

    }) 
</script>


@endsection


   
