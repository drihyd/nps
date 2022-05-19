<!-- Start row -->
<div class="row border-1">
@include('admin.dashboard.dashboard_card_count')
</div>
<div class="row border-1"> 

<!-- Start col -->
<div class="col-lg-12">
<div class="card m-b-30">
<div class="card-body">
<form class="table-filter form-inline" action="{{route('filter.dashboard')}}" method="get">
@csrf



<div class="form-group mb-2">
<select class="form-control form-control-sm" name="select_period" id="select_period" onchange = "select_period_dates(this.value)">
<option value="thismonth" {{ $request->select_period == "thismonth" ? 'selected':''}}>This Month</option>
<option value="lastthreemonth" {{ $request->select_period == "lastthreemonth" ? 'selected':''}}>Latest three Months</option>
<option value="selectaperiod" {{ $request->select_period== "selectaperiod" ? 'selected':''}}>Select a period</option>
</select>
</div>

&nbsp;&nbsp;

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




&nbsp;
@include('admin.common_pages.surveys',['quetion'=>$request->question_id??''])
&nbsp;
@include('admin.common_pages.action_button')
</form>
</div>
</div>
</div>


<div class="clearfix"></div>


<!-- Start col -->
@include('admin.dashboard.graph_nps_count')
@include('admin.dashboard.split_nps_count')
<!-- End col -->
</div>
<!-- End row --> 