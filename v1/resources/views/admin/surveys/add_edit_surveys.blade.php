@extends('admin.template_v1')
@if(isset($surveys_data->id))
@section('title', 'Edit Questionnaire')
@else
@section('title', 'Add Questionnaire')
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
                  @if(isset($surveys_data->id))

          
<form id="crudTable" action="{{url(Config::get('constants.admin').'/questionnaire/update')}} " method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$surveys_data->id}}">
@else
<form id="crudTable" action="{{url(Config::get('constants.admin').'/questionnaire/store')}}" method="POST"  enctype="multipart/form-data">
@endif  
      @csrf
      <div class="row">
        <div class="col-md-5">
          <input type="hidden" name="organization_id" value="{{auth()->user()->organization_id??''}}">
          <input type="hidden" name="admin_user_id" value="{{auth()->user()->id??''}}">
          <div class="form-group">
            <label><b>Title</b><span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="title" value="{{old('title',$surveys_data->title??'')}}" required="required" data-parsley-pattern="/^[a-z\d\-_\s]+$/i" />
          </div>
          <div class="form-group">
            <label><b>Descripton</b><span style="color: red;">*</span></label>
            <textarea class="form-control" name="description" required="required" maxlength="250" rows="3">{{old('description',$surveys_data->description??'')}}</textarea>
          </div>
          <div class="form-group">
        <label><b>Is Open</b><span style="color: red;">*</span></label>
      </div>
      <div class="form-group">
        <input type="radio" class="rdbtn"  name="isopen" value="yes" {{ old('isopen',$surveys_data->isopen??'') == 'yes'?'checked':'checked'}}/>
        <label>On</label>
        <input type="radio" class="rdbtn" name="isopen" value="no" required="required"    {{ old('isopen',$surveys_data->isopen??'') == 'no'?'checked':''}}/>
        <label>Off</label>
      </div>
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <a href="{{url(Config::get('constants.admin').'/questionnaire')}}" class="btn btn-danger btn-sm">Back</a>

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
 