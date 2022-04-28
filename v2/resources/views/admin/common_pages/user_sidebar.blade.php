<div class="leftbar">
<!-- Start Sidebar -->
<div class="sidebar">
<!-- Start Logobar -->
@include('admin.common_pages.header_logos')
<!-- End Logobar -->
<!-- Start Navigationbar -->
<div class="navigationbar">
<ul class="vertical-menu">
<li class="{{ (request()->is(Config::get('constants.user').'/dashboard')) ? 'active' : '' }}">
<a href="{{url(Config::get('constants.user').'/dashboard')}}">
<img src="{{URL::to('assets/images/svg-icon/dashboard.svg')}}" class="img-fluid" alt="widgets"><span>Dashboard</span><!--<span class="badge badge-success pull-right">New</span>-->
</a>
</li> 

<li class="{{ (request()->is(Config::get('constants.user').'/responses')) ? 'active' : '' }}">
<a href="{{url(Config::get('constants.user').'/responses')}}">
<img src="{{URL::to('assets/images/svg-icon/basic.svg')}}" class="img-fluid" alt="apps"><span>View Responses</span><i class="feather"></i>
</a>
</li>


<li class="{{ (request()->is(Config::get('constants.user').'/user/survey/start')) ? 'active' : '' }}">
<a href="{{URL(Config::get('constants.user').'/survey')}}" target="_blank">
<!--<a href="{{URL(Config::get('constants.user').'/survey/start/'.Crypt::encryptString(1))}}" target="_blank">-->
<img src="{{URL::to('assets/images/svg-icon/basic.svg')}}" class="img-fluid" alt="apps"><span>Take Feedback</span><i class="feather"></i>
</a>
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