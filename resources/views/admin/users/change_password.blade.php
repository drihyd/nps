@extends('cms.template')
@section('content')
@include('cms.alerts')
<div class="row">
            <div class="col-lg-12">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title">{{$pageTitle??""}}</h5>
                            </div>
                            <div class="card-body">
<form id="crudTable" action="{{url('cms/change_password/store')}}" method="post">
						@csrf
						 <div class="border-top pt-2">
						<div class="row">
							<div class="col-sm-8">
								<div class="form-group">
								<div class="row">
									<div class="col-sm-4">
									<label>Old Password<span style="color: red;">*</span></label>
									</div>
									<div class="col-sm-5">
									<input type="password" class="form-control form-control-sm" name="current_password" id="" value="" required />
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
									<label>New Password<span style="color: red;">*</span></label>
									</div>
									<div class="col-sm-5">
									<input type="password" class="form-control form-control-sm" name="new_password" id="" value="" required />
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
									<input type="password" class="form-control form-control-sm" name="new_confirm_password" id="" value="" required />
									<br>

									<button type="submit" class="btn btn-primary btn-danger">Change</button>
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
  name: {
      required: true,
      minlength:3,
      maxlength:100
    },
     code: {
      required: true,
      minlength:1,
      maxlength:100
    },
    max_admissions: {
      required: true,
      number:true,
      minlength:1,
      maxlength:100
    },course_fee: {
      required: true,
      number:true,
      minlength:2,
      maxlength:100
    },
    institute_id: {
      required: true
    }
  }
});
 </script> 
 @endpush