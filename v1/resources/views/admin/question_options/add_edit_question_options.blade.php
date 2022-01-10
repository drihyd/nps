@extends('admin.template_v1')
@if(isset($questions_options_data->id))
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
                  @if(isset($questions_options_data->id))

          
<form id="crudTable" action="{{url(Config::get('constants.admin').'/questions_options/update')}} " method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$questions_options_data->id}}">
@else
<form id="crudTable" action="{{url(Config::get('constants.admin').'/questions_options/store')}}" method="POST"  enctype="multipart/form-data">
@endif  
      @csrf
      <div class="row">
        <div class="col-md-5">
          <input type="hidden" name="organization_id" value="{{auth()->user()->organization_id??''}}">
          <div class="form-group" id="survey_id">
        <label for="survey_id">Questions<span class="text-red"style="color: red;">*</span></label>
        <select  class="form-control" name="question_id" id="question_id" required="required">
          <option value="">-- Select --</option>
          @foreach($questions_data as $questions)
            <option value="{{$questions->id}}" {{ old('question_id',$questions_options_data->question_id??'') == $questions->id ? 'selected':''}}>{{$questions->label??''}} - {{$questions->survey_id??''}}</option>
          @endforeach
              
        </select>
      </div>
          <div class="form-group">
            <label><b>Question Options</b><span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="option_value" value="{{old('option_value',$questions_options_data->option_value??'')}}" required="required" />
          </div>
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <a href="{{url(Config::get('constants.admin').'/questions_options')}}" class="btn btn-danger btn-sm">Back</a>

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
 