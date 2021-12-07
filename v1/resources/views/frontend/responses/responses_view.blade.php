@extends('frontend.template_v1')
@section('title', Str::title($person_data->firstname??'')." Feedback")
@section('content')




	
	
       
			
			
<div class="" >

<!-- <a href="{{route('session.logout')}}" class="pull-right" style="margin-left:20px;">
<img src="{{URL::to('assets/images/svg-icon/logout.svg')}}" class="img-fluid" alt="apps"><span>Logout</span><i class="feather "></i>
</a> -->




@include('frontend.common_pages.nav')



	
	


<div class="formify_box formify_box_checkbox background-white" style="width:100%">
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
                <h6>Feedback from {{Str::title($person_data->firstname??'')}} on {{date('F j, Y', strtotime($person_data->created_at??''));}}</h6>
               
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
				<a href="{{url('user/responses')}}" class="btn btn-success  mt-3">Go to Survey users</a>

</div>




</div>


</div>

</div>

</div>
    
   


@endsection

@push('scripts')


@endpush