

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

// REMAINING AMOUNT CALCULATION

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
                 $('input.netamount').val(sum);
              });
              //just update the total to sum  
              
            }
      
       