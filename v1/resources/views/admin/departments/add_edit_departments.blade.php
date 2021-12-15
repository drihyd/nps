@extends('admin.template_v1')
@if(isset($departments_data->id))
@section('title', 'Edit a team')
@else
@section('title', 'Add a team')
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
                  @if(isset($departments_data->id))

          
<form id="crudTable" action="{{url(Config::get('constants.admin').'/departments/update')}} " method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$departments_data->id}}">
@else
<form id="crudTable" action="{{url(Config::get('constants.admin').'/departments/store')}}" method="POST"  enctype="multipart/form-data">
@endif  
      @csrf
      <div class="row">
        <div class="col-md-5">
          <input type="hidden" name="organization_id" value="{{auth()->user()->organization_id??''}}">
          <div class="form-group">
            <label><b>Name</b><span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="department_name" value="{{old('department_name',$departments_data->department_name??'')}}" required="required" data-parsley-pattern="/^[a-z\d\-_\s]+$/i"/>
          </div>
          <div class="form-group">
        <label><b>Is Display</b><span style="color: red;">*</span></label>
      </div>
      <div class="form-group">
        <input type="radio" class="rdbtn"  name="is_display" value="on" {{ old('is_display',$departments_data->is_display??'') == 'on'?'checked':'checked'}}/>
        <label>On</label>
        <input type="radio" class="rdbtn" name="is_display" value="off" required="required"    {{ old('is_display',$departments_data->is_display??'') == 'off'?'checked':''}}/>
        <label>Off</label>
      </div>
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <a href="{{url(Config::get('constants.admin').'/departments')}}" class="btn btn-danger btn-sm">Back</a>

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
 