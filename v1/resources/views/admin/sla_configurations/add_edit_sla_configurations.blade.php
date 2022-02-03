@extends('admin.template_v1')
@if(isset($sla_configurations_data->id))
@section('title', 'Edit SLA Configuration')
@else
@section('title', 'Add SLA Configuration')
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
                  @if(isset($sla_configurations_data->id))

          
<form id="crudTable" action="{{url(Config::get('constants.admin').'/sla_configurations/update')}} " method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$sla_configurations_data->id}}">
@else
<form id="crudTable" action="{{url(Config::get('constants.admin').'/sla_configurations/store')}}" method="POST"  enctype="multipart/form-data">
@endif  
      @csrf
      <div class="row">
        <div class="col-md-5">
          <input type="hidden" name="organization_id" value="{{auth()->user()->organization_id??''}}">
          <div class="form-group" id="survey_id">
        <label for="survey_id">Levels<span class="text-red"style="color: red;">*</span></label>
        <select  class="form-control" name="level_id" id="level_id" required="required">
          <option value="">-- Select --</option>
          @foreach($group_levels_data as $group_level)
            <option value="{{$group_level->id}}" {{ old('level_id',$sla_configurations_data->level_id??'') == $group_level->id ? 'selected':''}}>{{$group_level->alias??''}}</option>
          @endforeach
              
        </select>
      </div>
          <div class="form-group">
            <label><b>X Minutes</b><span style="color: red;">*</span></label>
            <input type="number" class="form-control" name="x_minutes" value="{{old('x_minutes',$sla_configurations_data->x_minutes??'')}}" required="required" />
          </div>
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <a href="{{url(Config::get('constants.admin').'/sla_configurations')}}" class="btn btn-default btn-sm">Back</a>

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
 