@extends('layouts.layout')
@section('content')
  
  
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">  
      <div class="container" style="padding: 2rem 14rem 0;" id="DivIdToPrint">
        <div class="row">
          <div class="col-md-6" style="padding: 0px 18px 0px ;">
            <h2 style="font-size: 2rem;font-weight: 700;color: #389dd8;">Santosh Pakodewala</h2>
            <p><b>Phone:</b><span>91 123 123 123</span></p>
            <p><b>Email:</b><span>santoshpakodewala@gmail.com</span></p>
            <p><b>Web:</b><span>www.santoshpakodewala.com</span></p>
            <p><b>Address:</b><span>Manewada Nagpur</span></p>
            
          </div>
          <div class="col-md-6">
            <div style="padding: 40px 0px;text-align: right;">
                 <p><span><b>INVOICE NO:</b></span></p>
                <p><span><b>INVOICE DATE:</b></span></p>
            </div>
            <div>
              
            </div>
         
          </div>
        </div>
     
      <div class="row"> 
        <div class="col-md-12">
         
         <table class="table bordered" style="border:2px solid #b2b5b7">
          <thead>
            <th style="    background: #389dd8;color: white">Sr.No</th>
            <th style="    background: #389dd8;color: white">Description</th>
            <th style="    background: #389dd8;color: white">Price</th>
            <th style="    background: #389dd8;color: white">Quantity</th>
            <th style="    background: #389dd8;color: white">Total</th>
          </thead>
           <tbody>
            @foreach($item_data as $data)
            <?php $i=1; ?>
             <tr>
               <td><?php echo "$i";?></td>
               <td>{{ $data->item_name }}</td>
               <td>{{ $data->price }}</td>
               <td>{{ $data->quantity }}</td>
               <td>{{  $data->total }}</td>
             </tr>
             <?php $i++; ?>
             @endforeach
             
           </tbody>
         </table>
         <form>
         
         </form>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
       </div>
        <a href="" class="btn btn-primary" onclick='printDiv();' style="position: relative;
    left: 43%;">Print Invoice</a>
    </section>
    <!-- /.content -->
  
@endsection

@section('customscripts')
<script type="text/javascript">
  function printDiv() 
{

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}
</script>
@endsection