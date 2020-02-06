@extends('layouts.layout')



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
            <form method="POST" action="{{ route('sell.store') }}"  enctype="multipart/form-data">
             {{ csrf_field() }}
               @method('POST')
              <div style="display:none;">
              <input type="hidden" name="invoice_date" value="<?php echo(date("d/m/Y")) ?>">
            </div>             
             <div class="box-body">
              <div class="form-group">
              
                 <!-- Item table start -->
                  
                <div class="form-group table-responsive">
                  <table  class="table table-condensed-xs">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Item Name</th>
                      <th>Quantity</th>
                      <th>Rate</th>
                      <th>Total Price</th>
                    </tr>
                    </thead>

                    <tbody class="add_new_field" id="myTable">
                      <?php for($i = 1; $i <= 1; $i++){ ?>
                        
                      <tr>
                        <td>
                          &nbsp;
                        </td>
                   
                        <td>  
                          <div class="form-group">
                            
                            <div class="input text">
                              <input name="item_name[]" class="Product" placeholder="Item Name" type="text" >
                            </div>             
                         </div>
                         <p style="color:red">@error('item_name') {{$message}} @enderror</p></td>
                       <td>   
                          <div class="form-group">
                          
                            <div class="input text">
                              <input name="quantity[]" class="Quantity" placeholder="Quantity" type="text" >
                            </div>             
                          </div>
                          <p style="color:red">@error('quantity') {{$message}} @enderror</p></td>
                      <td>   
                         <div class="form-group">
                        
                           <div class="input text">
                            <input name="price[]" class="Rate" placeholder="Rate" type="text" >
                           </div>             
                          </div>
                         <p style="color:red">@error('rate') {{$message}} @enderror</p></td>
                     <td>   
                  <div class="form-group">
              
                  <div class="input text">
                    <input name="total_price[]" class=" Amount" placeholder="Total Price" type="text" id="myentry" >
                  </div>             
                </div>
                <p style="color:red">@error('total_price') {{$message}} @enderror</p></td>
                    <td>
                      <input type="button" value="&times;" class="del btn btn-danger" /> 
                    </td>    
                      </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td>
                        <label>Adjustment</label>
       <input type="checkbox" id="myCheck" name="adjustment" value="1"  onclick="myFunction()" >
                        </td>
                      
                           <th colspan="2">Total</th>
                        
                        <td>
                           <input name="net_amount" class="form-control netamount " placeholder="Grand Total" type="text" id="total_amt" value="">
                             
                        
                        </td>
                        
                       
                      </tr>
                    </tfoot>
                  </table>

                <input type="button" value="Add New" id="add" class="btn btn-primary" />
                  <button type="button" class=" del btn  btn-danger ">Delete Row</button>
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



   
