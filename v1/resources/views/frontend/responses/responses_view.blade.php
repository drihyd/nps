@extends('frontend.template_v1')
@section('title', Str::title($person_data->firstname??'')." Response")
@section('content')




	
	
       
			
			
<div class="formify_right_fullwidth align-items-center justify-content-center" style="max-width: ;">

<!-- <a href="{{route('session.logout')}}" class="pull-right" style="margin-left:20px;">
<img src="{{URL::to('assets/images/svg-icon/logout.svg')}}" class="img-fluid" alt="apps"><span>Logout</span><i class="feather "></i>
</a> -->


<div class="survey-profilebar">
	<div class="mt-4 ml-5 home-icon">
		<a href="#"><i class="fa fa-home"></i></a>
		<a href="{{url('user/responses')}}" class="">Survey users</a>
		<a href="#" class="">Logout</a>
	</div>
	<div class="dropdown float-right mt-4 mr-5">
	  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    <img src="{{URL::to('assets/uploads/61a852217e298_1638421025.png')}}" class="img-fluid">
	  </button>
	  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
	  	<div class="dropdown-item">
            <div class="profilename">
              <h5>{{Str::Title(auth()->user()->firstname??'')}} </h5>
            </div>
        </div>
	    <ul class="list-unstyled mb-0">
	        <!-- <li class="media dropdown-item">
	            <a href="#" class="profile-icon"><img src="{{URL::to('assets/images/svg-icon/user.svg')}}" class="img-fluid" alt="user">My Profile</a>
	        </li>   -->                                                    
	        <li class="media dropdown-item">
	            <a href="{{route('session.logout')}}" class="profile-icon"><img src="{{URL::to('assets/images/svg-icon/logout.svg')}}" class="img-fluid" alt="logout">Logout</a>
	        </li>
	    </ul>
	  </div>
	</div>
</div>

<div class="formify_box formify_box_checkbox background-white" style="max-width:620px;">
<div class="formify_header">
<h4 class="form_title">@yield('title')</h4>
<div class="border ml-0"></div>
</div>
<div class="tab-content" id="myTabContent">


 
<div class="box_info">


<div class="container">
<div class="row">
<div class="col-xs-12">
	
        <div class="card m-b-30">
            <div class="card-header">
                <h4>Response from {{Str::title($person_data->firstname??'')}} on {{date('F j, Y', strtotime($person_data->created_at??''));}}</h4>
               
            </div>
            <div class="card-body">
                @foreach($person_responses_data as $person_response)

                <b>{{$loop->iteration}}) {{ Str::replace('*teamname*', $person_response->option_value??'', $person_response->question_label??'') }}</b>&ensp;&nbsp;
                @if($person_response->answeredby_person == '')
                <p>A) {{$person_response->option_value??''}}</p>
                @else
                    <p>A) {{$person_response->answeredby_person??''}}</p>
                @endif
                <br>
                @endforeach
            </div>
        </div>
				<a href="{{url('user/survey')}}" class="btn thm_btn next_tab text-transform-inherit mt-3">Back to Start Survey</a>

</div>




</div>


</div>

</div>

</div>
    
   


@endsection

@push('scripts')


@endpush