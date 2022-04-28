@extends('frontend.template_v1')
@section('title', 'Survey Step-1')
@section('content')



	
       
			
	@if(auth()->user())		
<div class="justify-content-center" style="width:100%">
@else
	<div class="justify-content-center" style="width:100%">
@endif

@if(auth()->user())
@include('frontend.common_pages.nav')
@else
@endif


<div class="formify_box formify_box_checkbox background-white">


@if(auth()->user())
@include('frontend.common_pages.survey_description')
@else
	
@endif
<br>
<div class="tab-content" id="myTabContent">



	@if(auth()->user())
		
<form action="{{ route('post.choosedepartment') }}" class="signup_form" method="post">
	@else
	<form action="{{ route('offline.surveyone.post') }}" class="signup_form" method="post">
	@endif







@csrf
 
<div class="box_info">
<p class="page-header">{{str_replace("*companyname*",Session::get('comapny_name'),$Questions[0]->qlabel??'')}}</p>

<div class="container pl-sm-0">

<!--- Display Activity -->
@foreach($departments as $key=>$value)
<div class="col-md-12">
<input onchange = "EnableDisableTextBox('{{$value->department_name}}')" required id="departments" type="checkbox" name="first_questin_range[]" class="btn btn-scale btn-scale-asc-2" value="{{$value->id}}">{{$value->department_name}}
</div>
@endforeach
<div class="col-md-12">
<div class="hide_show_other_department" style="display:none;">

<div class="form-group">
<label for="">
<input type="text" maxlength="250" name="other_department" id="other_department" class=" other_department"  value="{{old('other_department',$person_responses_data[0]->other_department??'')}}" />


</div>
</div>

</div>


</div>

<button type="submit" class="btn thm_btn next_tab text-transform-inherit mt-5">Next</button>
</div>



<input type="hidden" name="organization_id" value="{{Session::get('companyID')??0,}}"/>
<input type="hidden" name="question_id" value="{{$Questions[0]->qid??0}}"/>
<input type="hidden" name="survey_id" value="{{Session::get('survey_id')??0,}}"/>

</form>


</div>

</div>


</div>
    
   


@endsection

@push('scripts')



<script type="text/javascript">
      function EnableDisableTextBox(val) {
		if (val == "Other") {			
				$(".hide_show_other_department").show();				
				$('#other_department').attr('required', true); 
		   }			
			else {	
				$('#other_department').attr('required', false);					
				$(".hide_show_other_department").hide();				 
            }
    }
	
	


	
</script>




@endpush