<div class="leftbar">
<!-- Start Sidebar -->
<div class="sidebar">
<!-- Start Logobar -->
@include('admin.common_pages.header_logos')
<!-- End Logobar -->
<!-- Start Navigationbar -->
<div class="navigationbar">
<ul class="vertical-menu">
<li class="{{ (request()->is(Config::get('constants.admin').'/dashboard')) ? 'active' : '' }}">
<a href="{{url(Config::get('constants.admin').'/dashboard')}}">
<img src="{{URL::to('assets/images/svg-icon/dashboard.svg')}}" class="img-fluid" alt="widgets"><span>Dashboard</span><!--<span class="badge badge-success pull-right">New</span>-->
</a>
</li>

<li class="{{ (request()->is(Config::get('constants.admin').'/feedback')) ? 'active' : '' }}">
<a href="{{URL(Config::get('constants.admin').'/survey')}}" target="_blank">
<i class="dripicons-clipboard"></i><span>Take Feedback</span><i class="feather"></i>
</a>
</li>


<li class="{{ (request()->is(Config::get('constants.admin').'/responses')) ? 'active' : '' }}">
<a href="{{url(Config::get('constants.admin').'/responses')}}">
<i class="dripicons-article"></i><span>View Responses</span><i class="feather"></i>
</a>
</li>
 
<li>
<a href="javaScript:void();">
<img src="{{URL::to('assets/images/svg-icon/chart.svg')}}" class="img-fluid" alt="widgets"><span>Action List</span><i class="feather icon-chevron-right pull-right"></i>
</a>
<ul class="vertical-submenu">
<!-- <li class="{{ (request()->is(Config::get('constants.admin').'/responses')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/responses')}}">New Cases</a></li>
<li class=""><a href="">Assigned Cases</a></li>
<li class=""><a href="">Transferred Cases</a></li>
<li class=""><a href="">Closed Cases</a></li>
<li class=""><a href="">Process Closure</a></li> -->
<!-- <li class="{{ (request()->is(Config::get('constants.admin').'/responses_reports/?ticket_status=all')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/responses_reports/?ticket_status=all')}}">Detractors Reports</a></li> -->
<li class="{{ (request()->is(Config::get('constants.admin').'/responses_reports/?ticket_status=new-cases')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/responses_reports/?ticket_status=new-cases')}}">New Cases</a></li>
<li class="{{ (request()->is(Config::get('constants.admin').'/responses_reports/?ticket_status=assigned-cases')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/responses_reports/?ticket_status=assigned-cases')}}">Assigned Cases</a></li>
<li class="{{ (request()->is(Config::get('constants.admin').'/responses_reports/?ticket_status=closed-cases')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/responses_reports/?ticket_status=closed-cases')}}">Closed Cases</a></li>
<li class="{{ (request()->is(Config::get('constants.admin').'/responses_reports/?ticket_status=process-pending')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/responses_reports/?ticket_status=process-pending')}}">Process Pending</a></li>
<li class="{{ (request()->is(Config::get('constants.admin').'/responses_reports/?ticket_status=process-closure')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/responses_reports/?ticket_status=process-closure')}}">Process Closure</a></li>
</ul>
</li>
<li class="{{ (request()->is(Config::get('constants.admin').'/users')) ? 'active' : '' }}">
<a href="{{url(Config::get('constants.admin').'/users')}}">
<img src="{{URL::to('assets/images/svg-icon/user.svg')}}" class="img-fluid" alt="apps"><span>Users</span><i class="feather"></i>
</a>
</li>


<li>
<a href="javaScript:void();">
<i class="dripicons-user-group"></i><span>Teams</span><i class="feather icon-chevron-right pull-right"></i>
</a>
<ul class="vertical-submenu">
<li class="{{ (request()->is(Config::get('constants.admin').'/departments')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/departments')}}">All Teams</a></li>
<li class="{{ (request()->is(Config::get('constants.admin').'/activities')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/activities')}}">All Activities</a></li>
</ul>
</li>
<li>
<a href="javaScript:void();">
<i class="dripicons-network-3"></i><span>Designation Levels</span><i class="feather icon-chevron-right pull-right"></i>
</a>
<ul class="vertical-submenu">
<li class="{{ (request()->is(Config::get('constants.admin').'/designations')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/designations')}}">Levels</a></li>
<li class="{{ (request()->is(Config::get('constants.admin').'/designation_levels')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/designation_levels')}}">Sub Levels</a></li>
<li class="{{ (request()->is(Config::get('constants.admin').'/designation_roles')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/designation_roles')}}">Designations</a></li>
</ul>
</li>

<li>
<a href="javaScript:void();">
<i class="dripicons-question"></i><span>Masters</span><i class="feather icon-chevron-right pull-right"></i>
</a>
<ul class="vertical-submenu">

<li class="{{ (request()->is(Config::get('constants.admin').'/questionnaire')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/questionnaire')}}">Questionnaire</a></li>


<li class="{{ (request()->is(Config::get('constants.admin').'/questions')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/questions')}}">Questions</a></li>

<!--<li class="{{ (request()->is(Config::get('constants.admin').'/sla_configurations')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/sla_configurations')}}">SLA Configurations</a></li>-->
<li class="{{ (request()->is(Config::get('constants.admin').'/customer_fields_configurables')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/customer_fields_configurables')}}">Customer Fields</a></li>
<li class="{{ (request()->is(Config::get('constants.admin').'/questions_options')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/questions_options')}}">Questions Options</a></li>
<li class="{{ (request()->is(Config::get('constants.admin').'/process')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/process')}}">Process</a></li>
<li class="{{ (request()->is(Config::get('constants.admin').'/specifications')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/specifications')}}">Specialities</a></li>
<li class="{{ (request()->is(Config::get('constants.admin').'/doctors')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/doctors')}}">Doctors</a></li>
<li class="{{ (request()->is(Config::get('constants.admin').'/wards')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/wards')}}">Wards</a></li>
</ul>
</li>

<li>
<a href="javaScript:void();">
<img src="{{URL::to('assets/images/svg-icon/settings.svg')}}" class="img-fluid" alt="apps"><span>Settings</span><i class="feather icon-chevron-right pull-right"></i>
</a>
<ul class="vertical-submenu">
<li class="{{ (request()->is(Config::get('constants.admin').'/notifications')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/notifications')}}">Gateway</a></li>
</ul>
</li>
<li>
<a href="javaScript:void();">
<i class="dripicons-graph-pie"></i><span>Reports</span><i class="feather icon-chevron-right pull-right"></i>
</a>
<ul class="vertical-submenu">
<li class="{{ (request()->is(Config::get('constants.admin').'/nps-graph')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/nps-graph')}}">NPS Graph</a></li>
<li class="{{ (request()->is(Config::get('constants.admin').'/feedback-composition')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/feedback-composition')}}">Feedback Composition</a></li>

<li class="{{ (request()->is(Config::get('constants.admin').'/graph-primary-drivers')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/graph-primary-drivers')}}">Primary Drivers</a></li>
<li class="{{ (request()->is(Config::get('constants.admin').'/graph-secondary-drivers')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/graph-secondary-drivers')}}">Secondary Drivers</a></li>
	
<!-- <li class="{{ (request()->is(Config::get('constants.admin').'/responses_reports/?ticket_status=all')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/responses_reports/?ticket_status=all')}}">Detractors Reports</a></li>
<li class="{{ (request()->is(Config::get('constants.admin').'/responses_reports/?ticket_status=new-cases')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/responses_reports/?ticket_status=new-cases')}}">New Cases</a></li>
<li class="{{ (request()->is(Config::get('constants.admin').'/responses_reports/?ticket_status=assigned-cases')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/responses_reports/?ticket_status=assigned-cases')}}">Assigned Cases</a></li>
<li class="{{ (request()->is(Config::get('constants.admin').'/responses_reports/?ticket_status=closed-cases')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/responses_reports/?ticket_status=closed-cases')}}">Closed Cases</a></li> -->
<li class="{{ (request()->is(Config::get('constants.admin').'/responses_reports/?ticket_status=end-action-comments')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/responses_reports/?ticket_status=end-action-comments')}}">Comments</a></li>
<li class="{{ (request()->is(Config::get('constants.admin').'/performitor_reports')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/performitor_reports')}}">Performitors Reports</a></li>
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