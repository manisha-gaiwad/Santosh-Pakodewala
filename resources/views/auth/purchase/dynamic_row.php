<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="form-group table-responsive">
                  <table id="myTable" class="table table-condensed-xs">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Item Name</th>
                      <th>Quantity</th>
                      <th>Rate</th>
                      <th>Total Price</th>
                    </tr>
                    </thead>

                    <tbody class="add_new_field">
                      <?php for($i = 1; $i <= 1; $i++){ ?>
                        
                      <tr>
                        <td>
                          &nbsp;
                        </td>
                   
                        <td>  
                          <div class="form-group">
                            
                            <div class="input text">
                              <input name="item_name[]" class="form-control" placeholder="Item Name" type="text" >
                            </div>             
                         </div>
                    </td>
                       <td>   
                          <div class="form-group">
                          
                            <div class="input text">
                              <input name="quantity[]" class="form-control newquantity" placeholder="Quantity" type="text" >
                            </div>             
                          </div>
                         </td>
                      <td>   
                         <div class="form-group">
                        
                           <div class="input text">
                            <input name="price[]" class="form-control newrate" placeholder="Rate" type="text" >
                           </div>             
                          </div>
                       </td>
                     <td>   
                  <div class="form-group">
              
                  <div class="input text">
                    <input name="total_price[]" class="form-control newproductPrice" placeholder="Total Price" type="text" id="myentry" >
                  </div>             
                </div>
                </td>
                         
                      </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td>
                          &nbsp;
                        </td>
                        <td>
                          &nbsp;
                        </td>
                        <td>
                           <input name="net_amount" class="form-control netamount " placeholder="Grand Total" type="text" id="totalAmount" value="">
                             
                        
                        </td>
                        <td>
                            <input name="paid_amount" class="form-control " placeholder="Paid Amount" type="text" id="PaidAmount">
                        </td>
                        <td>
                            <input name="remaining_amount" class="form-control " placeholder="Remaining Amount" type="text" id="paindingAmount" >
                        </td>
                        <input type="hidden" name="status" value="<?php if($_POST['remaining_amount']==0)
                        {
                          echo('COMPLETE');
                        }
                        else{ echo('Pending'); } ?>">
                      </tr>
                    </tfoot>
                  </table>

                  <input type="button" class="btn  btn-info add-row" value="Add Row" id="addrow">
                  <button type="button" class="btn  btn-danger delete-row">Delete Row</button>
        

                </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>               
<script>
	var max = 2;
  $(".add-row").click(function()
  {
  var markup = '<tr><td><input type="checkbox" name="record"></td><td><input name="item_name[]" class="form-control" placeholder="Iteam Name" type="text" id="mastersIteamName"></td><td><input name="quantity[]" class="form-control newquantity" placeholder="Quantity" type="text" id="mastersQuantity"></td><td><input name="price[]" class="form-control newrate" placeholder="Rate" type="text" id="mastersRate"></td><td><input name="total_price[]" class="form-control newproductPrice" placeholder="Tatal Price" type="text" id="myentry"></td></tr>';
    max++;
    $("table tbody").append(markup);
  });
 // DELETE add

   $(".delete-row").click(function(){
          $("table tbody").find('input[name="record"]').each(function(){
            if($(this).is(":checked")){
              var exitMaxVal = $('.maxvalue').val();
              var reduceVal = exitMaxVal-1;
              $(this).parents("tr").remove();
              $(".maxvalue").val(reduceVal);
            }
          });
        });
$(document).on('change', '#PaidAmount', function (e) {
        let target = e.target;

        var totalamt = parseFloat($('#totalAmount').val())

        var paidamt = parseFloat($('#PaidAmount').val())
        penamt = totalamt - paidamt;
        $('#paindingAmount').val(penamt)

    }) 

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

    $(".newquantity").change(function()
     {              
      updateAmounts();
    });
    $(".newrate").change(function()
     {              
      updateAmounts();
    });

    function updateAmounts() 
    {
      $('.newquantity').each(function() 
      {
        var quantity = parseFloat($(this).find('.newquantity', this).val());
        var rate = parseFloat($(this).find('.newrate', this).val());
         if (typeof quantity === 'number' && quantity && typeof rate === 'number' && rate) 
          {
            var calculatedValue = quantity * rate;
            calculatedValue = Math.round(calculatedValue * 100) / 100;
            $(this).find('.newproductPrice').val(calculatedValue);
          } 
          else
          {
            $(this).find('.newproductPrice').val('');
          }
                
    });
    
    $(".newrate").each(function() 
    {  
       var sum = 0.0;
      var quantity = $('.newquantity').val();
      var rate = $(".newrate").val();
      var amount = (quantity*rate);
            sum+=amount;
                $(".newproductPrice").val(amount);
                 $(".netamount").val(sum);
              });
              //just update the total to sum  
              $('input.netamount').val(sum);
            }
      
       
</script>
</body>
</html>