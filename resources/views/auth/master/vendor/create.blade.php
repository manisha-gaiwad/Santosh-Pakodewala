@extends('layouts.layout')
@section('content')
  
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
            <form method="POST" action="{{ route('vendor.store') }}" id="VendorAddVendorForm"  enctype="multipart/form-data">
              @csrf
               @method('POST')
              <div style="display:none;">
              
            </div>             
             <div class="box-body">
                <div class="form-group">
                  <label>Name</label>
                  <div class="input text">
                    <input name="name" class="form-control" placeholder="Name"  maxlength="150" type="text" id="VendorName"/>
                  </div>               
                 </div>
                    <p style="color:red">@error('name') {{$message}} @enderror</p>
                <div class="form-group">
                  <label>Mobile No</label>
                  <div class="input text"><input name="mob" class="form-control" placeholder="Mobile No"  maxlength="10" type="text" id="VendorMob"/></div>             
                     </div>
                        <p style="color:red">@error('mob') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>Email</label>
                  <div class="input text"><input name="email" class="form-control" placeholder="Email" maxlength="255" type="text" id="VendorEmail"/></div>              
                    </div>
                       <p style="color:red">@error('email') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>Vender Bussiness Type</label>
                  <div class="input select">
                    <select name="business_type_id" class="form-control total" id="VendorBusinessTypeId">
                      <option value="">Select Bussiness Type</option>
                      <option value="1">Test</option>
                      <option value="2">Vegitablewala</option>
                      </select></div>                </div>
                         <p style="color:red">@error('business_type_id') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>GST No.</label>
                  <div class="input text">
                    <input name="gstin_number" class="form-control" placeholder="GST No."  maxlength="255" type="text" id="VendorGstinNumber"/>
                  </div>               
                   </div>
                      <p style="color:red">@error('gstin_number') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>Pan No.</label>
                  <div class="input text"><input name="pan_number" class="form-control" placeholder="Pan No."  maxlength="255" type="text" id="VendorPanNumber"/>
                  </div>               
                   </div>
                      <p style="color:red">@error('pan_number') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>IFC No.</label>
                  <div class="input text">
                    <input name="ifc_code" class="form-control" placeholder="Pan No."  maxlength="255" type="text" id="VendorIfcCode"/>
                  </div>               
                   </div>
                      <p style="color:red">@error('ifc_code') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>Bank Name</label>
                  <div class="input text">
                    <input name="bank_name" class="form-control" placeholder="Bank Name" maxlength="255" type="text" id="VendorBankName"/>
                  </div>               
                   </div>
                      <p style="color:red">@error('bank_name') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>Bank Account Number</label>
                  <div class="input text">
                    <input name="bank_account_number" class="form-control" placeholder="Bank Account Number"  maxlength="255" type="text" id="VendorBankAccountNumber"/>
                  </div>                
                </div>
                   <p style="color:red">@error('bank_account_number') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>Adhar number</label>
                  <div class="input text">
                    <input name="adhar_number" class="form-control" placeholder="Adhar number"  maxlength="12" type="text" id="VendorAdharNumber"/>
                  </div>               
                   </div>
                      <p style="color:red">@error('adhar_number') {{$message}} @enderror</p>
                <div class="form-group">
                  <label for="exampleInputPassword1">Address</label>
                  <textarea name="address" class="form-control" placeholder="Address"  id="VendorAddress"></textarea>                </div>
                     <p style="color:red">@error('address') {{$message}} @enderror</p>
                
              </div>
              <!-- /.box-body -->
            <div class="box-footer">
            <div class="submit">
            
                <button type="submit" class="btn btn-primary ">Add Vendor</button>
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
   
