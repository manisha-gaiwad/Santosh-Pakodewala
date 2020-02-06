@extends('layouts.layout')
@section('content')
  

    <section class="content-header">
      <h1>Edit Vendor Details</h1>
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
              <h3 class="box-title">Edit Vendor Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('vendor.update', $vendor->id) }}" id="VendorAddVendorForm"  enctype="multipart/form-data">
              @csrf
               @method('PUT')
              <div style="display:none;">
              
            </div>             
             <div class="box-body">
                <div class="form-group">
                  <label>Name</label>
                  <div class="input text">
                    <input name="name" class="form-control" placeholder="Name" required="required" maxlength="150" type="text" id="VendorName" value="{{ $vendor->name }}" />
                  </div>               
                     </div>
                      <p style="color:red">@error('name') {{$message}} @enderror</p>
                <div class="form-group">
                  <label>Mobile No</label>
                  <div class="input text">
                    <input name="mob" class="form-control" placeholder="Mobile No" required="required" maxlength="10" type="text" id="VendorMob" value="{{ $vendor->mob }}" />
                  </div>             
                     </div>
                      <p style="color:red">@error('mob') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>Email</label>
                  <div class="input text">
                    <input name="email" class="form-control" placeholder="Email" maxlength="255" type="text" id="VendorEmail"/ value="{{ $vendor->email }}" >
                  </div>              
                    </div>
                      <p style="color:red">@error('email') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>Vender Bussiness Type</label>
                  <div class="input select">
                    <select name="business_type_id" class="form-control total" id="VendorBusinessTypeId">
<option value="{{ $vendor->business_type_id }} " >{{ $vendor->business_type_id }} </option>
<option value="Test">Test</option>
<option value="Vegitablewala">Vegitablewala</option>
</select></div>                </div>
  <p style="color:red">@error('business_type_id') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>GST No.</label>
                  <div class="input text">
                    <input name="gstin_number" class="form-control" placeholder="GST No." required="required" maxlength="255" type="text" id="VendorGstinNumber" value="{{ $vendor->gstin_number }} " />
                  </div>               
                   </div>
                    <p style="color:red">@error('gstin_number') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>Pan No.</label>
                  <div class="input text"><input name="pan_number" class="form-control" placeholder="Pan No." required="required" maxlength="255" type="text" id="VendorPanNumber" value="{{ $vendor->pan_number }}   "/>
                  </div>                </div>
                    <p style="color:red">@error('pan_number') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>IFC No.</label>
                  <div class="input text">
                    <input name="ifc_code" class="form-control" placeholder="Pan No." required="required" maxlength="255" type="text" id="VendorIfcCode"  value="{{ $vendor->ifc_code }} " />
                  </div>               
                   </div>
                    <p style="color:red">@error('ifc_code') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>Bank Name</label>
                  <div class="input text">
                    <input name="bank_name" class="form-control" placeholder="Bank Name" required="required" maxlength="255" type="text" id="VendorBankName" value="{{ $vendor->bank_name }} "/>
                  </div>               
                   </div>
                    <p style="color:red">@error('bank_name') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>Bank Account Number</label>
                  <div class="input text">
                    <input name="bank_account_number" class="form-control" placeholder="Bank Account Number" required="required" maxlength="255" type="text" id="VendorBankAccountNumber" value="{{ $vendor->bank_account_number }}" />
                  </div>                
                </div>
                  <p style="color:red">@error('bank_account_number') {{$message}} @enderror</p>

                <div class="form-group">
                  <label>Adhar number</label>
                  <div class="input text">
                    <input name="adhar_number" class="form-control" placeholder="Adhar number" required="required" maxlength="12" type="text" id="VendorAdharNumber" value="{{ $vendor->adhar_number }} "/>
                  </div>               
                   </div>
                    <p style="color:red">@error('adhar_number') {{$message}} @enderror</p>
                <div class="form-group">
                  <label for="exampleInputPassword1">Address</label>
                  <textarea name="address" class="form-control" placeholder="Address" required="required" id="VendorAddress"  >{{ $vendor->address }} </textarea>              
                    </div>
                      <p style="color:red">@error('address') {{$message}} @enderror</p>
                
              </div>
              <!-- /.box-body -->
            <div class="box-footer">
            <div class="submit">
            
                <button type="submit" class="btn btn-primary ">Update Vendor</button>
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
   
