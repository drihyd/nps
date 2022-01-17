@extends('admin.template_v1')
@if(isset($questions_data->id))
@section('title', 'Edit a Level')
@else
@section('title', 'Add a Level')
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
              <div class="row">
                <div class="col-sm-12">
                  @if(isset($group_level_data->id))

          
<form id="crudTable" action="{{url(Config::get('constants.admin').'/designations/update')}} " method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$group_level_data->id}}">
@else
<form id="crudTable" action="{{url(Config::get('constants.admin').'/designations/store')}}" method="POST"  enctype="multipart/form-data">
@endif  
      @csrf
      <div class="row">
        <div class="col-md-5">
          <input type="hidden" name="organization_id" value="{{auth()->user()->organization_id??''}}">
          
          <div class="form-group">
            <label><b>Name</b><span style="color: red;">*</span><small>(Example: Top Managemnt)</small></label>
            <input type="text" class="form-control" name="name" value="{{old('name',$group_level_data->name??'')}}" required="required" data-parsley-pattern="/^[a-z\d\-_\s]+$/i"/>
          </div>
          <div class="form-group">
            <label><b>Level code</b><span style="color: red;">*</span><small>(Example: L1)</small></label>
            <input type="text" class="form-control" name="alias" required="required" data-parsley-pattern="/^[a-z\d\-_\s]+$/i" value="{{old('alias',$group_level_data->alias??'')}}" />
          </div>
		  <div class="form-group">
            <label><b>Escalation minutes</b><span style="color: red;">*</span></label>
            <input type="number" class="form-control" name="esc_minitues" required="required" value="{{old('esc_minitues',$group_level_data->esc_minitues??'')}}" />
          </div>
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <a href="{{url(Config::get('constants.admin').'/designations')}}" class="btn btn-danger btn-sm">Back</a>

        </div>
        <div class="col-md-5">
          
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
 