@extends('admin.template_v1')
@if(isset($questions_data->id))
@section('title', 'Edit Question')
@else
@section('title', 'Add Question')
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
                  @if(isset($questions_data->id))

          
<form id="crudTable" action="{{url(Config::get('constants.admin').'/questions/update')}} " method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$questions_data->id}}">
@else
<form id="crudTable" action="{{url(Config::get('constants.admin').'/questions/store')}}" method="POST"  enctype="multipart/form-data">
@endif  
      @csrf
      <div class="row">
        <div class="col-md-5">
          <input type="hidden" name="organization_id" value="{{auth()->user()->organization_id??''}}">
          <div class="form-group" id="survey_id">
        <label for="survey_id">Survey<span class="text-red"style="color: red;">*</span></label>
        <select  class="form-control" name="survey_id" id="survey_id" required="required">
          <option value="">-- Select --</option>
          @foreach($surveys_data as $survey)
            <option value="{{$survey->id}}" {{ old('survey_id',$questions_data->survey_id??'') == $survey->id ? 'selected':''}}>{{$survey->title??''}}</option>
          @endforeach
              
        </select>
      </div>
          <div class="form-group">
            <label><b>Label</b><span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="label" value="{{old('label',$questions_data->label??'')}}" required="required" />
          </div>
          <div class="form-group">
            <label><b>Sub Label</b></label>
            <input type="text" class="form-control" name="sublabel" value="{{old('sublabel',$questions_data->sublabel??'')}}" />
          </div>
          <div class="form-group">
        <label><b>Input Type</b><span style="color: red;">*</span></label>
        <select name="input_type" class="form-control" required="required">
      <option value="radio" {{ old('input_type',$questions_data->input_type??'') == 'radio'? 'selected':''}}>Radio</option>

      <option value="text" {{ old('input_type',$questions_data->input_type??'') == 'text'? 'selected':''}}>Text</option>
      <option value="dropdown" {{ old('input_type',$questions_data->input_type??'') == 'dropdown'? 'selected':''}}>Dropdown</option>
      <option value="checkbox" {{ old('input_type',$questions_data->input_type??'') == 'checkbox'? 'selected':''}}>Checkbox</option>

</select>
      </div>
          <div class="form-group">
        <label><b>Is Active</b><span style="color: red;">*</span></label>
      </div>
      <div class="form-group">
        <input type="radio" class="rdbtn"  name="active" value="yes" {{ old('active',$questions_data->active??'') == 'yes'?'checked':'checked'}}/>
        <label>On</label>
        <input type="radio" class="rdbtn" name="active" value="no" required="required"    {{ old('active',$questions_data->active??'') == 'no'?'checked':''}}/>
        <label>Off</label>
      </div>
      <div class="form-group">
            <label><b>Sort Order</b><span style="color: red;">*</span></label>
            <input type="number" class="form-control" name="sequence_order" value="{{old('sequence_order',$questions_data->sequence_order??'')}}" required="required" />
          </div>
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <a href="{{url(Config::get('constants.admin').'/questions')}}" class="btn btn-danger btn-sm">Back</a>

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
 