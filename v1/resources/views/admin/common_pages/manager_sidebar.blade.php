<div class="leftbar">
<!-- Start Sidebar -->
<div class="sidebar">
<!-- Start Logobar -->
<div class="logobar">
<a href="{{url(Config::get('constants.admin').'/dashboard')}}" class="logo logo-large"><img src="{{URL::to('assets/uploads/'.$theme_options_data->header_logo??'')}}" class="img-fluid" alt="logo"></a>
<a href="{{url(Config::get('constants.admin').'/dashboard')}}" class="logo logo-small"><img src="{{URL::to('assets/uploads/'.$theme_options_data->favicon??'')}}" class="img-fluid" alt="logo"></a>
</div>
<!-- End Logobar -->
<!-- Start Navigationbar -->
<div class="navigationbar">
<ul class="vertical-menu">
<li class="{{ (request()->is(Config::get('constants.admin').'/dashboard')) ? 'active' : '' }}">
<a href="{{url(Config::get('constants.admin').'/dashboard')}}">
<img src="{{URL::to('assets/images/svg-icon/dashboard.svg')}}" class="img-fluid" alt="widgets"><span>Dashboard</span><!--<span class="badge badge-success pull-right">New</span>-->
</a>
</li> 
<li>
<a href="javaScript:void();">
<img src="{{URL::to('assets/images/svg-icon/basic.svg')}}" class="img-fluid" alt="apps"><span>Departments</span><i class="feather icon-chevron-right pull-right"></i>
</a>
<ul class="vertical-submenu">
<li class="{{ (request()->is(Config::get('constants.admin').'/departments')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/departments')}}">Lists</a></li>
<li class="{{ (request()->is(Config::get('constants.admin').'/activities')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/activities')}}">Activities</a></li>
</ul>
</li>
<li class="{{ (request()->is(Config::get('constants.admin').'/users')) ? 'active' : '' }}">
<a href="{{url(Config::get('constants.admin').'/users')}}">
<img src="{{URL::to('assets/images/svg-icon/user.svg')}}" class="img-fluid" alt="apps"><span>Users</span><i class="feather"></i>
</a>
</li>
<li>
<a href="javaScript:void();">
<img src="{{URL::to('assets/images/svg-icon/basic.svg')}}" class="img-fluid" alt="apps"><span>Surveys</span><i class="feather icon-chevron-right pull-right"></i>
</a>
<ul class="vertical-submenu">
<li class="{{ (request()->is(Config::get('constants.admin').'/surveys')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/surveys')}}">Lists</a></li>

<li class="{{ (request()->is(Config::get('constants.admin').'/questions')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/questions')}}">Questions</a></li>
<li class="{{ (request()->is(Config::get('constants.admin').'/questions_options')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/questions_options')}}">Questions Options</a></li>
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