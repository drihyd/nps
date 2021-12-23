@extends('admin.template_v1')
@if(isset($customer_fields_configurables_data->id))
@section('title', 'Edit Customer Fields Configurables')
@else
@section('title', 'Add Customer Fields Configurables')
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
                  @if(isset($customer_fields_configurables_data->id))

          
<form id="crudTable" action="{{url(Config::get('constants.admin').'/customer_fields_configurables/update')}} " method="POST"  enctype="multipart/form-data">
<input type="hidden" name="id" value="{{$customer_fields_configurables_data->id}}">
@else
<form id="crudTable" action="{{url(Config::get('constants.admin').'/customer_fields_configurables/store')}}" method="POST"  enctype="multipart/form-data">
@endif  
      @csrf
      <div class="row">
        <div class="col-md-5">
          <input type="hidden" name="organization_id" value="{{auth()->user()->organization_id??''}}">
          <div class="form-group" id="survey_id">
        <label for="survey_id">Input Type<span class="text-red"style="color: red;">*</span></label>
        <select name="input_type" class="form-control" required="required">
          <option value="" >-- Select --</option>
      <option value="radio" {{ old('input_type',$customer_fields_configurables_data->input_type??'') == 'radio'? 'selected':''}}>Radio</option>
      <option value="text" {{ old('input_type',$customer_fields_configurables_data->input_type??'') == 'text'? 'selected':''}}>Text</option>
      <option value="dropdown" {{ old('input_type',$customer_fields_configurables_data->input_type??'') == 'dropdown'? 'selected':''}}>Dropdown</option>
      <option value="textarea" {{ old('input_type',$customer_fields_configurables_data->input_type??'') == 'textarea'? 'selected':''}}>Textarea</option>

</select>
      </div>
          <div class="form-group">
            <label><b>Input Name</b><span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="input_name" value="{{old('input_name',$customer_fields_configurables_data->input_name??'')}}" required="required" />
          </div>
          <div class="form-group">
            <label><b>Label</b><span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="label" value="{{old('label',$customer_fields_configurables_data->label??'')}}" required="required"/>
          </div>
          <div class="form-group">
            <label><b>Class Name</b><span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="class_name" value="{{old('class_name',$customer_fields_configurables_data->class_name??'')}}" required="required"/>
          </div>
          
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <a href="{{url(Config::get('constants.admin').'/customer_fields_configurables')}}" class="btn btn-danger btn-sm">Back</a>

        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label><b>Placeholder</b><span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="placeholder" value="{{old('placeholder',$customer_fields_configurables_data->placeholder??'')}}" required="required"/>
          </div>
          <div class="form-group">
            <label><b>Input Id</b><span style="color: red;">*</span></label>
            <input type="text" class="form-control" name="input_id" value="{{old('input_id',$customer_fields_configurables_data->input_id??'')}}" required="required"/>
          </div>
          <div class="form-group">
        <label><b>Is Display</b><span style="color: red;">*</span></label>
      </div>
      <div class="form-group">
        <input type="radio" class="rdbtn"  name="is_display" value="yes" {{ old('is_display',$customer_fields_configurables_data->is_display??'') == 'yes'?'checked':'checked'}}/>
        <label>On</label>
        <input type="radio" class="rdbtn" name="is_display" value="no" required="required"    {{ old('is_display',$customer_fields_configurables_data->is_display??'') == 'no'?'checked':''}}/>
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
 