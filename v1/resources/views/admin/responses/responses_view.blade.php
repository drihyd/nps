@extends('admin.template_v1')
@section('title', Str::title($person_data->firstname??''))
@section('content')
<div class="row">
    <!-- End col -->
    <div class="col-lg-8">
        <div class="card m-b-30">
            <div class="card-header">
                <h4>{{Str::title($person_data->firstname??'')}} Response</h4>
               
            </div>
            <div class="card-body">
                @foreach($person_responses_data as $person_response)
                <b>{{$loop->iteration}}) {{$person_response->question_label??''}}</b>&ensp;&nbsp;
                <p>A) {{$person_response->option_value??''}}</p>
                <br>
                @endforeach
            </div>
        </div>
    </div>  
    <!-- End col -->
    <!-- Start col -->
    
    <!-- End col -->
    <!-- Start col -->
    <!-- <div class="col-lg-12 col-xl-6">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Combodate (datetime)</h5>
            </div>
            <div class="card-body">                                
                <a href="#" id="xeditable-event" class="editable editable-click editable-empty"></a>
            </div>
        </div>
    </div>  --> 
    <!-- End col -->
</div>
<div class=" pb-5"> 
<a href="{{url(Config::get('constants.admin').'/responses')}}" class="btn btn-danger btn-sm">Back</a>
</div>
@endsection
