<div class="leftbar">
<!-- Start Sidebar -->
<div class="sidebar">
<!-- Start Logobar -->
<div class="logobar">
<a href="{{url(Config::get('constants.hod').'/dashboard')}}" class="logo logo-large"><img src="{{URL::to('assets/uploads/'.$theme_options_data->header_logo??'')}}" class="img-fluid" alt="logo"></a>
<a href="{{url(Config::get('constants.hod').'/dashboard')}}" class="logo logo-small"><img src="{{URL::to('assets/uploads/'.$theme_options_data->favicon??'')}}" class="img-fluid" alt="logo"></a>
</div>
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

<!--
<li class="{{ (request()->is(Config::get('constants.hod').'/hod/survey/start')) ? 'active' : '' }}">
<a href="{{URL(Config::get('constants.hod').'/survey')}}" target="_blank">
<img src="{{URL::to('assets/images/svg-icon/basic.svg')}}" class="img-fluid" alt="apps"><span>Take Feedback</span><i class="feather"></i>
</a>
</li>
-->

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