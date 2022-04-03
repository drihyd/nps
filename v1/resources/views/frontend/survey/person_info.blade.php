@extends('frontend.template_v1')
@section('title', 'Survey Step-1')
@section('content')

<div class="formify_right_fullwidth align-items-center justify-content-center">

<!-- <a href="{{route('session.logout')}}" class="pull-right" style="margin-left:20px;">
<img src="{{URL::to('assets/images/svg-icon/logout.svg')}}" class="img-fluid" alt="apps"><span>Logout</span><i class="feather "></i>
</a> -->




@include('frontend.common_pages.nav')


<div class="formify_box_checkbox background-white">
@include('frontend.common_pages.survey_description')

<div class="tab-content" id="myTabContent">

@if($Surveys->count()>0)





@csrf
 
<div class="box_info">


<div class="container">
<div>
<div>




<div class="background-white">
@if(auth()->user()->role==2)
<form action="{{ route('post.survey.personinfo.'.Config::get('constants.admin')) }}" class="" method="post">
@elseif(auth()->user()->role==4)
<form action="{{ route('post.survey.personinfo.'.Config::get('constants.hod')) }}" class="" method="post">
@elseif(auth()->user()->role==5)
<form action="{{ route('post.survey.personinfo.'.Config::get('constants.operantionalhead')) }}" class="" method="post">
@else
	<form action="{{ route('post.survey.personinfo.'.Config::get('constants.user')) }}" class="" method="post">
@endif
@csrf
<div class="row">
        <div class="col-md-12 pl-sm-0">
          
		  	<div class="form-group">
                <label><b>Feedback Date</b><span class="text text-danger">*</span></label>
				<input type="date" class="form-control" id="feedback_date"  name="feedback_date" value="{{old('feedback_date',$users_data->feedback_date??date('Y-m-d'))}}" required="required">
		     </div>
		  
		  
          <div class="form-group">
            <label><b>Full Name</b><span class="text text-danger">*</span></label>
            <input type="text" class="form-control" name="firstname" value="{{old('firstname',$users_data->firstname??'')}}" required="required" />
          </div>
          <div class="form-group">
            <label><b>Email</b><span class="text text-danger">*</span></label>
            <input type="email" name="email" class="form-control" required="required" value="{{old('email',$users_data->email??'')}}">
          </div>
          <div class="form-group">
                <label><b>Mobile</b><span class="text text-danger">*</span></label>
                <input type="number" name="phone" id="title" class="form-control" value="{{old('phone',$users_data->phone??'')}}" required="required" data-parsley-minlength="10" data-parsley-maxlength="10" required="required">
          </div>  
		  
		  <div class="form-group">
                <label><b>Bed Number</b></label>
                <input type="text" name="bed_name" id="bed_name" class="form-control" value="{{old('bed_name',$users_data->bed_name??'')}}" >
          </div>  
          
           @include('masters.wards',['is_required'=>"is_required"])
          
		  <div class="form-group">
                <label><b>UHID Number</b><span class="text text-danger">*</span></label>
                <input type="text" name="uhid" id="uhid" class="form-control" value="{{old('uhid',$users_data->uhid??'')}}" required>
          </div>		 

		  <div class="form-group">
                <label><b>IP #</b></label>
                <input type="text" name="inpatient_id" id="inpatient_id" class="form-control" value="{{old('inpatient_id',$users_data->inpatient_id??'')}}">
          </div>
		  
		  <div class="form-group">
                <label><b>Discharge Date</b></label>
				<input type="date" class="form-control" id="discharge_date"  name="discharge_date" value="{{old('discharge_date',$users_data->discharge_date??date('Y-m-d'))}}">
		     </div>
			 
			 
			 @include('masters.doctors',['is_required'=>"is_required"])
			 
			
			 
			 
        
          	<div class="form-group">            
              

 @foreach($custom_fields as $custom_field)
          	@if($custom_field->input_type == 'radio')

<div>
  <table>
    <tbody>
      <tr>
        <td><strong>{{Str::title($custom_field->label??'')}}<span class="text text-danger">*</span></strong></td>
        <td width="5"></td>
		<td><input type="{{$custom_field->input_type??''}}" class="form-control" style="width: 11px;height: 11px;" name="{{$custom_field->input_name??''}}" id="{{$custom_field->input_name??''}}" value="male" required></td>
        <td>Male</td>
		<td width="10"></td>
        <td><input type="{{$custom_field->input_type??''}}" class="form-control" style="width: 11px;height: 11px;" name="{{$custom_field->input_name??''}}" id="{{$custom_field->input_name??''}}" value="female" required></td>
        <td>Female</td>

      </tr>
    </tbody>
  </table>
</div>

</div>



 @include('masters.feedbackby',['is_required'=>"required"])
 

 
 
 
 
<div class="hide_patient_attender" style="display:none;">

<div class="form-group">
<label for="patient_attender_name"><b>Patient Attender Name</b>
</label>
<input type="text" name="patient_attender_name" id="patient_attender_name" class="form-control process_level_closure">
</div>

</div>
 
 

 
 @include('masters.howtoknoworg',['is_required'=>"required"])


@else
@endif
@endforeach
		  
		  
		  <div class="form-group form-check">
		  
		   <input type="hidden" class="form-control" id="sendlink_email" name="sendlink_email">
    
  </div>
		  

	 
		
		   
		  <button type="submit" class="btn btn-outline-danger mt-4" id="manulsurvey">Start Survey</button>
		  
		   <button type="submit" class="btn btn-default mt-4" id="notmanulsurvey">Send survey link</button>
	
		  
		 
		  
      
</div>

</div>
<input type="hidden" name="survey_id" value="{{$Surveys[0]->id??0}}"/>
<input type="hidden" name="organization_id" value="{{$Surveys[0]->organization_id??0}}"/>
</form>


</div>


</div> 
 

 

</div>




</div>



@else
	<p>Please create survey.</p>
@endif

</div>

</div>



</div>
    
   


@endsection

@push('scripts')

<script>
$('#manulsurvey').click(function(){
    $('#sendlink_email').val(0);
});

$('#notmanulsurvey').click(function(){
    $('#sendlink_email').val(1);
});
</script>

@endpush