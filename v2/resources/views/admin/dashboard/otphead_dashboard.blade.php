<!-- Start row -->
<div class="rows">
@include('admin.dashboard.dashboard_card_count')
</div>
<div class="row"> 
<div class="clearfix"></div>
<!-- Start col -->
@include('admin.dashboard.graph_nps_count')
@include('admin.dashboard.split_nps_count')
<!-- End col -->
</div>
<!-- End row --> 