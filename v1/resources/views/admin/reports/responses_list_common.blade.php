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

&nbsp;

@if(isset(auth()->user()->role) && auth()->user()->role==3)

<!--@include('admin.common_pages.ticket_status')-->
@else
@include('admin.common_pages.teams',['pickteam'=>$pickteam??''])
@include('admin.common_pages.surveys',['quetion'=>$quetion??''])
@endif



&nbsp;
@include('admin.common_pages.action_button')
&nbsp;
<div class="text-sm-right mt-2" style="width: 100%;">
<a class="btn btn-warning btn-sm mb-2" href="{{route('hod.export')}}?ticket_status={{$status??'all'}}">Export Data</a>
</div>
<input type="hidden" name="ticket_status" value="{{$status??'all'}}"/>
</form>
@include('admin.reports.table_lists',['Data'=>$Detractors,'is_action_enabled'=>'yes'])



        </div>
      </div>
</div>
</div>
        @endsection



