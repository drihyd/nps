@extends('admin.template_v1')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">{{$pageTitle??''}}</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
                 @if(isset($users_data->id))
<form id="crudTable" action="{{url('profile/update')}} " method="POST"  enctype="multipart/form-data">

@else
@endif  
      @csrf
      <div class="row">
        <div class="col-md-5">
          
          <div class="form-group">
            <label><b>Full Name</b><span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="firstname" value="{{old('firstname',$users_data->firstname??'')}}" required="required" />
          </div>
          <div class="form-group">
            <label><b>Email</b><span style="color: red;">*</span></label>
            <input type="email" name="email" class="form-control" required="required" value="{{old('email',$users_data->email??'')}}">
          </div>
          <div class="form-group">
                <label><b>Mobile</b><span style="color: red;">*</span></label>
                <input type="number" name="phone" id="title" class="form-control" value="{{old('phone',$users_data->phone??'')}}" required="required" data-parsley-minlength="10" data-parsley-maxlength="10">
          </div>
          
      
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <a href="{{url('admin/users')}}" class="btn btn-danger btn-sm">Back</a>

        </div>
        <div class="col-md-5">
          <div class="form-group">
        <label>Profile<span style="color: red">*</span></label>       
        <input type="file"  name="profile" class="file-input" @if(isset($users_data->profile)) @else required @endif  />
      </div>
      <div class="form-group">
        @if(isset($users_data->profile) && !empty($users_data->profile))
        <img src="{{ asset('assets/uploads/' . $users_data->profile) }}" width="100"   />
        @else
        @endif
      </div>
          <div class="form-group">
        <label><b>Password</b><span style="color: red;">*</span></label>
        <input name="password" type="password" class="form-control"  id="password" @if(isset($users_data->password)) @else required @endif>
      </div><!-- <div class="form-group">
        <label><b>Password</b><span style="color: red;">*</span></label>
        <input name="password" type="password" class="form-control"  pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.cpassword.pattern = this.value;" placeholder="Password" @if(isset($users_data->password)) @else required @endif>
      </div> -->
      <div class="form-group">
        <label><b>Confirm Password</b><span style="color: red;">*</span></label>
        <input name="cpassword" type="password" class="form-control" data-parsley-equalto="#password"  @if(isset($users_data->password)) @else required @endif>
      </div><!-- <div class="form-group">
        <label><b>Confirm Password</b><span style="color: red;">*</span></label>
        <input name="cpassword" type="password" class="form-control" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" placeholder="Confirm Password"  @if(isset($users_data->password)) @else required @endif>
      </div> -->
      
        </div>
        </div> 
        </form> 
                </div>
              </div>
                
            </div>
        </div>

    </div>
    <!-- End col -->
</div>
@endsection

@push('scripts')
    <!-- flot charts scripts-->    
<script type="text/javascript">
  $(document).ready(function() {
    $("form").validate({
      rules:{
        firstname:{
          required:true,
        },copyright:{
          required:true,
          
        },
        twitter_url:{
          required:true,
          url:true
        },linkedin_url:{
          required:true,
          url:true
        },facebook_url:{
          required:true,
          url:true
        },
      },
      
     });
});
</script>
@endpush