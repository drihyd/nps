@extends('admin.template_v1')
@section('title', 'Reports')
@section('content')
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            
             <div class="card-header">
                <h5 class="card-title">@yield('title')</h5>
            </div>
            <div class="card-body">
      <form class="table-filter mb-4 form-inline" action="{{route('filter.responses_reports')}}" method="post">
@csrf

@include('admin.common_pages.dates_input')
@include('admin.common_pages.teams',['pickteam'=>$pickteam??''])
&nbsp;
@include('admin.common_pages.surveys',['quetion'=>$quetion??''])
&nbsp;
@include('admin.common_pages.action_button')
&nbsp;
<a class="btn btn-warning mb-2" href="{{ route('export') }}">Export Data</a>
<div class="form-group mb-2">
@if(auth()->user())
@if(auth()->user()->role==2)
<a href="{{url(Config::get('constants.admin').'/responses_reports')}}">Clear filter</a>
@else
<a href="{{url(Config::get('constants.user').'/responses_reports')}}">Clear filter</a>
@endif
@else
<a href="#">
@endif

</div>

<input type="text" name="ticket_status" value="{{$status}}"/>

</form>
          @include('admin.reports.table_lists',['Data'=>$Detractors,'is_action_enabled'=>'yes'])



        </div>
      </div>
</div>
</div>
        @endsection



