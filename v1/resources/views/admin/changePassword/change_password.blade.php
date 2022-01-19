@extends('admin.template_v1')
@section('title', 'Reset Password')
@section('content')
@include('admin.alerts');

<div class="row">
            <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title"> @yield('title')</h5>
                            </div>
                            <div class="card-body">
<form id="crudTable" action="{{route('verifying.password')}}" method="post">
						@csrf
						 <div class="border-top pt-2">
						 <!--
						<div class="row">
							<div class="col-sm-8">
								<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
									<label>Old Password<span style="color: red;">*</span></label>
									</div>
									<div class="col-sm-5">
									<input type="password" class="form-control form-control-sm" name="current_password" id="current_password" value="" required />
									</div>
								</div>
								</div>
							</div>
						</div>
						-->
						<div class="row">	
							<div class="col-sm-8">
								<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
									<label>New Password<span style="color: red;">*</span></label>
									</div>
									<div class="col-sm-5">
									<input type="password" class="form-control form-control-sm" name="password" id="password" value="" required />
									</div>
								</div>
								</div>
							</div>
						</div>
						<div class="row">	
							<div class="col-sm-8">
								<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
									<label>Confirm New Password<span style="color: red;">*</span></label>
									</div>
									<div class="col-sm-5">
									<input type="password" class="form-control form-control-sm" name="password_confirmation" id="password" value="" required />
									<br>

									<button type="submit" class="btn btn-primary btn-sm">Change</button>
									</div>
								</div>
								</div>

								 
							</div>
						</div>

						
					</div>
					
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
@push('scripts')
<script>
   $("#crudTable").validate({
  rules: {
new_password:{
		required:false,
		minlength:8,
		},
		password_confirmation:
		{
		required:false,
		minlength:8,
		equalTo: "#new_password",

		}
  }
});
 </script> 
 @endpush