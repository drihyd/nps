@extends('admin.template_v1')
@section('title', $pageTitle)
@section('content')
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            
        
            <div class="card-body">
      <form class="table-filter mb-4 form-inline" action="{{route('filter.responses_reports')}}?ticket_status={{$status??'all'}}" method="post">
@csrf

@include('admin.common_pages.dates_input')
@if(isset(auth()->user()->role) && auth()->user()->role==3)

@else
@include('admin.common_pages.teams',['pickteam'=>$pickteam??''])
&nbsp;
@include('admin.common_pages.surveys',['quetion'=>$quetion??''])
@endif
@if($status=="all")
&nbsp;
@include('admin.common_pages.ticket_status',['ticket_status'=>$ticketing_status??''])
@endif
&nbsp;
@include('admin.common_pages.action_button')
&nbsp;
<a class="btn btn-warning btn-sm mb-2" href="{{route('data.export')}}?ticket_status={{$status??'all'}}">Export Data</a>
<input type="hidden" name="ticket_status" value="{{$status??'all'}}"/>
</form>
@include('admin.reports.table_lists',['Data'=>$Detractors,'is_action_enabled'=>'yes'])



        </div>
      </div>
</div>
</div>
        @endsection



