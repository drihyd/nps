<div class="leftbar">
<!-- Start Sidebar -->
<div class="sidebar">
<!-- Start Logobar -->
@include('admin.common_pages.header_logos')
<!-- End Logobar -->
<!-- Start Navigationbar -->
<div class="navigationbar">
<ul class="vertical-menu">
<li class="{{ (request()->is(Config::get('constants.hod').'/dashboard')) ? 'active' : '' }}">
<a href="{{url(Config::get('constants.hod').'/dashboard')}}">
<img src="{{URL::to('assets/images/svg-icon/dashboard.svg')}}" class="img-fluid" alt="widgets"><span>HOD Dashboard</span><!--<span class="badge badge-success pull-right">New</span>-->
</a>
</li> 

<li class="{{ (request()->is(Config::get('constants.hod').'/responses')) ? 'active' : '' }}">
<a href="{{url(Config::get('constants.hod').'/responses')}}">
<img src="{{URL::to('assets/images/svg-icon/basic.svg')}}" class="img-fluid" alt="apps"><span>View Responses</span><i class="feather"></i>
</a>
</li>


<li class="{{ (request()->is(Config::get('constants.hod').'/hod/survey/start')) ? 'active' : '' }}">
<a href="{{URL(Config::get('constants.hod').'/survey')}}" target="_blank">
<img src="{{URL::to('assets/images/svg-icon/basic.svg')}}" class="img-fluid" alt="apps"><span>Take Feedback</span><i class="feather"></i>
</a>
</li>


<li>
<a href="javaScript:void();">
<i class="dripicons-graph-pie"></i><span>Reports</span><i class="feather icon-chevron-right pull-right"></i>
</a>
<ul class="vertical-submenu">
<li class="{{ (request()->is(Config::get('constants.hod').'/responses_reports/?ticket_status=patient_level_closure')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.hod').'/responses_reports/?ticket_status=patient_level_closure')}}">Patient Closure</a></li>
<li class="{{ (request()->is(Config::get('constants.hod').'/responses_reports/?ticket_status=process_level_closure')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.hod').'/responses_reports/?ticket_status=process_level_closure')}}">Process Closure</a></li>
</ul>
</li>

<li>
<a href="javaScript:void();">
<img src="{{URL::to('assets/images/svg-icon/chart.svg')}}" class="img-fluid" alt="widgets"><span>Graphs</span><i class="feather icon-chevron-right pull-right"></i>
</a>
<ul class="vertical-submenu">
<li class="{{ (request()->is(Config::get('constants.hod').'/graphs')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.hod').'/graphs')}}">Dashboard 1</a></li>
<li class="{{ (request()->is(Config::get('constants.hod').'/graphs-in-patient')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.hod').'/graphs-in-patient')}}">Dashboard 2</a></li>
</ul>
</li> 



<li>
<a href="{{route('session.logout')}}">
<img src="{{URL::to('assets/images/svg-icon/logout.svg')}}" class="img-fluid" alt="apps"><span>Logout</span><i class="feather "></i>
</a>
</li>
</ul>
</div>
<!-- End Navigationbar -->
</div>
<!-- End Sidebar -->
</div>