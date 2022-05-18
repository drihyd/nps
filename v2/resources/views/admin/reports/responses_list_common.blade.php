@extends('admin.template_v1')
@section('title', $pageTitle)
@section('content')
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            
        
            <div class="card-body">
      <form class="table-filter mb-4 form-inline" action="{{route('filter.responses_reports')}}?ticket_status={{$status??'all'}}" method="get">
@csrf



<div class="form-group mb-2">
<select class="form-control form-control-sm" name="select_period" id="select_period" onchange = "select_period_dates(this.value)">
<option value="thismonth" {{ $request->select_period == "thismonth" ? 'selected':''}}>This Month</option>
<option value="lastthreemonth" {{ $request->select_period == "lastthreemonth" ? 'selected':''}}>Latest three Months</option>
<option value="selectaperiod" {{ $request->select_period== "selectaperiod" ? 'selected':''}}>Select a period</option>
</select>
</div>



<div class="hide_selectaperiod" style="display:none;">
<div class="col-lg-6">
<div class="form-group mb-2" >
Period from
@if(isset($from_date) && !empty($from_date))
<input type="date" class="form-control form-control-sm" id="from_date"  name="from_date" value="" >
@else 
<input type="date" class="form-control form-control-sm" id="from_date"  name="from_date" value="">	
@endif
</div>
</div>
<div class="col-lg-6">
<div class="form-group mb-2">
Period to
@if(isset($to_date) && !empty($to_date))
<input type="date" class="form-control form-control-sm" id="to_date"  name="to_date" value="">
@else 
	<input type="date" class="form-control form-control-sm" id="to_date"  name="to_date" value="">
@endif
</div>
</div>
</div>

&nbsp;&nbsp;




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



