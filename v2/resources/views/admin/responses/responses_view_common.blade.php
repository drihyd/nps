<div class="card m-b-30" style="min-height: 372px;">
<div class="card-body">


<div class="row">				
<div class="col-12 mb-3">

<div class="kanban-tag">

@if($person_responses_data[0]->rating<=6)
<span class="badge badge-primary-inverse font-20"><h4>Ticket Number {{$person_data->ticker_final_number??''}}</h4></span>
@elseif($person_responses_data[0]->rating>6 && $person_responses_data[0]->rating<=8)
<span class="badge badge-primary-inverse font-20"><h4>Ticket Number {{$person_data->ticker_final_number??''}}</h4></span>
@else
<span class="badge badge-primary-inverse font-20"><h4>Feedback</h4></span>
@endif


</div>


</div>
</div>


<div class="row">		

<div class="col-3">
<p class="nps-score-div"><span class="nps-score">{{$person_responses_data[0]->rating??''}}</span><br> NPS Score</p>
</div>
<div class="col-9 nps-score-details">
<p><strong>{{Str::title($person_data->firstname??'')}}</strong></p>
<p>{{$person_data->email??''}}</p>
<p>{{$person_data->mobile??''}}</p>
<p class="mt-3">Feedback Date: {{date('F j, Y', strtotime($person_data->created_at??''));}}</p>
</div>
</div>

<div class="mt-4">




@if($person_responses_data[0]->rating<=6)
<h4><span class="badge badge-danger-inverse font-14">Areas of Improvement</span></h4>
@elseif($person_responses_data[0]->rating>6 && $person_responses_data[0]->rating<=8)
<h4><span class="badge badge-danger-inverse font-14">Areas of Improvement</span></h4>
@else
<h4><span class="badge badge-success-inverse font-14">Doing Well</span></h4>
@endif








<table class="responses-table  " style="width:100%">
<tbody>
@foreach($person_responses_data as $person_response)

@if($person_response->option_value== '')

@else							
<tr>
<td><b>{{$person_response->option_value??''}}</b></td>
<td>{{Str::title($person_response->department_activities??'')}}</td>
<td>{{Str::title($person_response->answeredby_person??'')}}</td>
<td>

@if($person_response->department_status)

<small class="text text-success">HOD taken action: {{Str::title(Str::replace("_"," ",$person_response->department_status??''))}}</small>
@endif
</td>
</tr>					
@endif

@endforeach


</tbody>
</table>
</div>
</div>
</div>





<!-- Start col -->


@if(isset($voice_message) && $voice_message->count()>0)
<div class="card m-b-30" style="min-height: 372px;">
<div class="card-body">


    <div class="col-lg-6">
        <div class="card m-b-30">
            <div class="card-header">
                <h4 class="card-title">Listen to Audio Records</h4>
            </div>
            <div class="card-body">
                
                
                @foreach($voice_message as $voice_file)
                <div class="audio-record-wrapper">





  <figure>
  
    <audio
        controls
        src="{{url('/public/voice_record_files/'.$voice_file->voice_file)}}">
            Your browser does not support the
            <code>audio</code> element.
    </audio>
</figure>
  
  
                        
                    <div class="audio-content">
                        <p class="mb-0">{{ date('G:i A.', strtotime($voice_file->created_at??'')) }} - {{date('M j, Y', strtotime($voice_file->created_at??''))}}</p>
                    </div>
                </div>
                @endforeach
                
                

                
                
            </div>
        </div>
    </div>
    </div>
    </div>
    
    @endif
    <!-- End col -->



