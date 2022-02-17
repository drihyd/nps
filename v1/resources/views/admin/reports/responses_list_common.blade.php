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
      <form class="table-filter mb-4 form-inline" action="{{route('filter.responses_reports')}}?ticket_status={{$status??'all'}}" method="post">
@csrf

@include('admin.common_pages.dates_input')
@include('admin.common_pages.teams',['pickteam'=>$pickteam??''])
&nbsp;
@include('admin.common_pages.surveys',['quetion'=>$quetion??''])
&nbsp;
@include('admin.common_pages.action_button')
&nbsp;
<div class="text-sm-right mt-2" style="width: 100%;">
<a class="btn btn-warning btn-sm mb-2" href="{{ route('export')}}?ticket_status={{$status??'all'}}">Export Data</a>
@if(auth()->user())
@if(auth()->user()->role==2)
<a class="btn btn-warning btn-sm mb-2" href="{{url(Config::get('constants.admin').'/responses_reports')}}?ticket_status={{$status??'all'}}">Reset</a>
@else
<a class="btn btn-warning btn-sm mb-2" href="{{url(Config::get('constants.user').'/responses_reports')}}?ticket_status={{$status??'all'}}">Reset</a>
@endif
@else
<a href="#">
@endif

</div>

<input type="hidden" name="ticket_status" value="{{$status??'all'}}"/>

</form>
          @include('admin.reports.table_lists',['Data'=>$Detractors,'is_action_enabled'=>'yes'])



        </div>
      </div>
</div>
</div>
        @endsection



