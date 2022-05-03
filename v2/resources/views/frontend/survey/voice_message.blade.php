@extends('frontend.template_v1')
@section('title', $Pagetitle)
@section('content')

<style>
    
    
    ol li {
	 list-style-type: none;
     }
     
     .recordingsList {
         
         margin-left:-45px;
     }
</style>
<div class="formify_right_fullwidth align-items-center justify-content-center">
@include('frontend.common_pages.nav')


<div class="formify_box_checkbox background-white">
    
    
@include('frontend.common_pages.survey_description')

<p>Recorded for Quality & Improvement</p>  
<div class="tab-content" id="myTabContent">
        
    
<div class="box_info">

  
<div id="controls">
<button id="recordButton" class="btn btn-outline-danger  mt-3"><i class="fa fa-play"></i></button>
<button id="pauseButton" disabled class="btn btn-outline-danger  mt-3"><i class="fa fa-pause"></i></button>
<button id="stopButton" disabled class="btn btn-outline-danger  mt-3"><i class="fa fa-stop"></i></button>
</div>
<div id="formats"></div>
<ol id="recordingsList" class="recordingsList"></ol>
<div class="row">
<div class="col-md-12">
<a href="{{route('choosedepartment')}}" class="btn btn-outline-danger  mt-3">Proceed to next</a>	

</div>
</div>
 
 
		  
      
</div>

</div>

</form>


</div>


</div> 
 

   


@endsection

@push('scripts')


<script>


var person_id_="{{Session::get('person_id')}}";
var posturl_voicefile="{{route('post.voice.message.file')}}";
</script>


<script src="{{URL::to('assets/js/voice_js/recorder.js')}}"></script>
<script src="{{URL::to('assets/js/voice_js/app.js')}}"></script>






@endpush