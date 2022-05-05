<!-- Start row -->
<div class="row">
@include('admin.dashboard.dashboard_card_count')
</div>
<div class="row"> 
<div class="clearfix"></div>

<!-- Start col -->
<div class="col-lg-12">
<div class="card m-b-30">
<div class="card-body">
<form class="table-filter mb-4 form-inline" action="{{route('filter.dashboard')}}" method="get">
@csrf
@include('admin.common_pages.dates_input',['from_date'=>$request->from_date??'','to_date'=>$request->to_date??''])
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