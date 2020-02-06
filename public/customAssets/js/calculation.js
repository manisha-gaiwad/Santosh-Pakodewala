 
// Add row


  var max = 2;
  $(".add-row").click(function()
  {
  var markup = '<tr><td><input type="checkbox" name="record"></td><td><input name="item_name[]" class="form-control" placeholder="Iteam Name" type="text" id="mastersIteamName"></td><td><input name="quantity[]" class="form-control newquantity" placeholder="Quantity" type="text" id="mastersQuantity"></td><td><input name="price[]" class="form-control newrate" placeholder="Rate" type="text" id="mastersRate"></td><td><input name="total_price[]" class="form-control newproductPrice" placeholder="Tatal Price" type="text" id="mastetotal"></td></tr>';
   $(".maxvalue").val(max);
    max++;
    $("table tbody").append(markup);



// add row end

// quantity price total


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
  });       
       
// quantity price total end 

        
// Find and remove selected table rows

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


