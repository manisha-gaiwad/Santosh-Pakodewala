@extends('layouts.layout')


@section('customcss')
<style type="text/css">
	
.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: transparent;
  color: black;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 70%;
    border-bottom: 1px solid black;
    padding: 8px;
    border-top: none;
    border-right: none;
    border-left: none;
    outline: none;
    background:transparent; 
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: #1e506d;
    color: white;
    padding: 11px 63px;
    border: none;
    cursor: pointer;
    /* width: 100%; */
    opacity: 0.9;
    float: right;
    position: relative;
    left: -65px;

}

.btn:hover {
  opacity: 1;
}
.form-style
{
	/*background: #e4e0da;*/
    padding: 2rem;
}
</style>
@endsection
@section('content')

  <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile Settings</li>
             
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<hr>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
            @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
              </div>
          </div>
              <div class="row">          
			<div class="col-md-5 col-sm-12 form-style">
				
				<div>
					
					<form method="POST"  action="/updateuser/{{ Auth::user()->id }}" enctype="multipart/form-data"  style="max-width:500px;margin:auto">
						@csrf
						 @method('POST')

						 <h4>Profile Information</h4>

						  <div class="input-container">
						    <i class="fas fa-user-edit icon"></i>
						    <input class="input-field" type="text" placeholder="Full Name" name="name" value="{{ Auth::user()->name }}">
						  </div>
						  <div class="input-container">
						    <i class="fa fa-user icon"></i>
						    <input class="input-field" type="text" placeholder="Username" name="username" value="{{ Auth::user()->username }}">
						  </div>
						  <div class="input-container">
						    <i class="fas fa-building icon"></i>
						    <input class="input-field" type="text" placeholder="Branch Name" name="branch_name" value="{{ Auth::user()->branch_name }}">
						  </div>
						  <div class="input-container">
						    <i class="fa fa-envelope icon"></i>
						    <input class="input-field" type="email" placeholder="Email" name="email" value="{{ Auth::user()->email }}">
						  </div>

						  <div class="input-container">
						    <i class="fas fa-award icon"></i>
						    <input class="input-field" type="text" placeholder="Role" name="role" readonly="readonly" value="{{ Auth::user()->role }}">
						  </div>
						  
						 
						  <button type="submit" class="btn">Update Profile</button>
					</form>

				</div>

			</div>
			<div class="col-md-2">
				
			</div>
			<div class="col-md-5 col-sm-12 form-style">
				<div style="    position: relative;
    top: 69px;">
					
				
				<form method="POST" action="{{ route('changePassword') }}" style="max-width:500px;margin:auto">
					{{ csrf_field() }}
						 <h4>Change Password</h4>
					<div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
						  <div class="input-container">
						    <i class="fas fa-user-edit icon"></i>
						    <input class="input-field" type="text" placeholder="Old Password" name="current-password" id="current-password">
						  </div>
						    @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
					</div>
					<div class="">
						  <div class="input-container">
						    <i class="fa fa-user icon"></i>
						    <input id="password" class="input-field" type="text" placeholder="New Password" name="password">
						  </div>
						   @if ($errors->has('password'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
						</div>
						  <div class="input-container">
						    <i class="fas fa-building icon"></i>
						    <input class="input-field" type="text" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation">
						  </div>
						  
						  
						 
						  <button type="submit" class="btn">Change Password</button>
					</form>
					</div>
			</div>
			
		</div>
	</div>
</section>

@endsection