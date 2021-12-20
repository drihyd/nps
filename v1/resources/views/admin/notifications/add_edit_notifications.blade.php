@extends('admin.template_v1')
@if(isset($questions_data->id))
@section('title', 'Edit Notification')
@else
@section('title', 'Add Notification')
@endif
@section('content')
  <div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">@yield('title')</h5>
            </div>
            <div class="card-body">
              @include('admin.alerts')
              <div class="row">
                <div class="col-sm-12">
                  @if(isset($notifications_data->id))

          
<form id="crudTable" action="{{url(Config::get('constants.admin').'/notifications/update')}} " method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$notifications_data->id}}">
@else
<form id="crudTable" action="{{url(Config::get('constants.admin').'/notifications/store')}}" method="POST"  enctype="multipart/form-data">
@endif  
      @csrf
      <div class="row">
        <div class="col-md-5">
          <input type="hidden" name="organization_id" value="{{auth()->user()->organization_id??''}}">
          <div class="form-group" id="survey_id">
        <label for="survey_id">Gateway<span class="text-red"style="color: red;">*</span></label>
        <select name="gateway_type" class="form-control" required="required">
      <option value="sms" {{ old('gateway_type',$notifications_data->gateway_type??'') == 'sms'? 'selected':''}}>SMS</option>

      <option value="email" {{ old('gateway_type',$notifications_data->gateway_type??'') == 'email'? 'selected':''}}>EMAIL</option>

</select>
      </div>
          <div class="form-group">
            <label><b>Username</b><span style="color: red;">*</span><small>(SMS/EMAIL)</small></label>
            <input type="text" class="form-control" name="username" value="{{old('username',$notifications_data->username??'')}}" required="required" />
          </div>
          <div class="form-group">
            <label><b>Password</b><span style="color: red;">*</span><small>(SMS/EMAIL)</small></label>
            <input type="password" class="form-control" name="password" value="{{old('password',$notifications_data->password??'')}}" required="" />
          </div>
          <div class="form-group">
            <label><b>Api key</b><small>(SMS/EMAIL)</small></label>
            <input type="text" class="form-control" name="api_key" value="{{old('api_key',$notifications_data->api_key??'')}}" />
          </div>
          <div class="form-group">
            <label><b>Secret key</b><small>(SMS/EMAIL)</small></label>
            <input type="text" class="form-control" name="secret_key" value="{{old('secret_key',$notifications_data->secret_key??'')}}" />
          </div>
          <div class="form-group">
            <label><b>Host Name</b><small>(SMS/EMAIL)</small></label>
            <input type="text" class="form-control" name="host_name" value="{{old('host_name',$notifications_data->host_name??'')}}" />
          </div>
          <div class="form-group">
            <label><b>Port No</b><small>(EMAIL)</small></label>
            <input type="number" class="form-control" name="port_no" value="{{old('port_no',$notifications_data->port_no??'')}}" />
          </div>
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <a href="{{url(Config::get('constants.admin').'/questions')}}" class="btn btn-danger btn-sm">Back</a>

        </div>
        <div class="col-md-5">
          
          <div class="form-group">
            <label><b>From Name</b><small>(SMS/EMAIL)</small></label>
            <input type="text" class="form-control" name="from_name" value="{{old('from_name',$notifications_data->from_name??'')}}" />
          </div>
          <div class="form-group">
            <label><b>From Address</b><small>(SMS/EMAIL)</small></label>
            <input type="text" class="form-control" name="from_address" value="{{old('from_address',$notifications_data->from_address??'')}}" />
          </div>
          <div class="form-group">
            <label><b>Mobile </b><small>(SMS)</small></label>
            <input type="number" class="form-control" name="mobile" value="{{old('mobile',$notifications_data->mobile??'')}}" />
          </div>
          <div class="form-group">
        <label><b>Is Active</b><span style="color: red;">*</span></label>
      </div>
      <div class="form-group">
        <input type="radio" class="rdbtn"  name="is_active" value="yes" {{ old('is_active',$questions_data->is_active??'') == 'yes'?'checked':'checked'}}/>
        <label>On</label>
        <input type="radio" class="rdbtn" name="is_active" value="no" required="required"    {{ old('is_active',$questions_data->is_active??'') == 'no'?'checked':''}}/>
        <label>Off</label>
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
<script>
   $("#crudTable").validate({
  rules: {
  name: {
      required: true,
    },
    role_id: {
      required: true,
      
    },
    is_active_status:{
      required: true,
    },
    
    password:
      {
         required:false,
         minlength:6,
      },
      mobile:
      {
         required:true,
         minlength:10,
         maxlength:10,
      },

     confirmpassword:
      {
         required:false,
         minlength:6,
         equalTo: "#password",
      
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
 