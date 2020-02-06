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
      <h1>Sell Item</h1>
</section>
<p class="login-box-msg"></p>
    <!-- Main content -->
    <section class="content">
      <div class="row">
         <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Sell Item</h3>
            </div>
          <form method="POST" action="{{ route('sell.store') }}"  enctype="multipart/form-data">
              {{ csrf_field() }}
               @method('POST')
                <div class="box-body">
             
              <input type="hidden" name="date" value="<?php echo(date('jS \of F Y')); ?>">
<table class="table">
  <thead>
    <tr>
      <!-- <th>Sl No</th> -->
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
                          
       <label>Adjustment</label>
       <input type="checkbox" id="myCheck" name="adjustment" value="1"  onclick="myFunction()" >
    </th>
    <th>
       <textarea name="adjustment_remark"  id="text" style="display:none"></textarea>
    </th>
      <th colspan="2">Total</th>
      

      
      <th><input type="text" name="total" id="total_amt">RS.</th>
      <th></th>
      
    </tr>
  </tfoot>
</table>
<input type="button" value="Add New" id="add" class="btn btn-primary" />
&nbsp;
<!-- <input type="submit" name="submit" value="Add Item" class="btn btn-info"> -->
</div>

<div class="box-footer">
  <div class="submit">
  
      <button type="submit" class="btn btn-info ">Add Invoice</button>
  </div>          
</div>

             </form>
          </div>
        </div>
      </div>
    </section>





@endsection
    
@section('customscripts')

<script type="text/javascript">
  $(function () {
  $("#add").click(function () {
    $("#master").clone().removeAttr("id").appendTo("tbody");
  });
  $("table").on("click", ".del", function () {
    $(this).closest("tr").remove();
  });
  $("table").on("input", "input", function () {
    $("tbody tr").each(function () {
      $this = $(this);
      if (this.id != "master")
        $this.find(".Amount").val(+$this.find(".Quantity").val() * +$(this).find(".Rate").val());
      $("#total_amt, #total_qty").val(0);

      $(".Amount").each(function () {
        if (this.value != "")
          $("#total_amt").val(parseInt($("#total_amt").val()) + parseInt($(this).val()));
      });

      $(".Quantity").each(function () {
        if (this.value != "")
          $("#total_qty").text(parseInt($("#total_qty").text()) + parseInt($(this).val()));
      });
    });
  });
});
  //cHECKBOX CHECKED
   function myFunction()
{
var checkBox = document.getElementById("myCheck");
var text = document.getElementById("text");
if (checkBox.checked == true)
{
    text.style.display = "block";
} 
else
{
     text.style.display = "none";
}

}  
</script>
@endsection


   
