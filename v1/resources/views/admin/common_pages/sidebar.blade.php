<div class="leftbar">
            <!-- Start Sidebar -->
            <div class="sidebar">
                <!-- Start Logobar -->    			
				@include('admin.common_pages.header_logos')		   
                <!-- End Logobar -->
                <!-- Start Navigationbar -->
                <div class="navigationbar">
                    <ul class="vertical-menu">
					
                        <li class="{{ (request()->is(Config::get('constants.superadmin').'/dashboard')) ? 'active' : '' }}">
                            <a href="{{url(Config::get('constants.superadmin').'/dashboard')}}">
                                <img src="{{URL::to('assets/images/svg-icon/dashboard.svg')}}" class="img-fluid" alt="widgets"><span>Dashboard</span><!--<span class="badge badge-success pull-right">New</span>-->
                            </a>
                        </li> 
                        
                        @if(Auth::check() && auth()->user()->role == 1 )
                        <li>
                            <a href="javaScript:void();">
                              <img src="{{URL::to('assets/images/svg-icon/basic.svg')}}" class="img-fluid" alt="apps"><span>Organizations</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li class="{{ (request()->is(Config::get('constants.superadmin').'/organizations')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.superadmin').'/organizations')}}">View all</a></li>
                                <li class="{{ (request()->is(Config::get('constants.superadmin').'/organizations/add-basicinfo')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.superadmin').'/organizations/add-basicinfo')}}">Add New</a></li>
								
                                <li class="{{ (request()->is(Config::get('constants.superadmin').'/admin-users')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.superadmin').'/admin-users')}}">Admin Users</a></li> 
                            </ul>
                        </li>
                       

	@endif

	@if(Auth::check() &&  auth()->user()->role == 1 && Session::get('companyID')>0)
	<li class="{{ (request()->is(Config::get('constants.admin').'/responses')) ? 'active' : '' }}">
	<a href="{{url(Config::get('constants.admin').'/responses')}}">
	<i class="dripicons-article"></i><span>View Responses</span><i class="feather"></i>
	</a>
	</li>
	@else

	@endif 	
	
	
	@if(Auth::check() &&  auth()->user()->role == 1 && Session::get('companyID')>0)
<li>
<a href="javaScript:void();">
<i class="dripicons-user-group"></i><span>Teams</span><i class="feather icon-chevron-right pull-right"></i>
</a>
<ul class="vertical-submenu">
<li class="{{ (request()->is(Config::get('constants.admin').'/departments')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/departments')}}">All Teams</a></li>
<li class="{{ (request()->is(Config::get('constants.admin').'/activities')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.admin').'/activities')}}">All Activities</a></li>
</ul>
</li>
	@else

	@endif           


        


						@if(Auth::check() &&  auth()->user()->role == 1  && Session::get('companyID')>0)
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
                        @else

                        @endif
						
						
												@if(Auth::check() &&  auth()->user()->role == 1)
                        <li>
                            <a href="javaScript:void();">
                              <img src="{{URL::to('assets/images/svg-icon/maps.svg')}}" class="img-fluid" alt="apps"><span>Settings</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li class="{{ (request()->is(Config::get('constants.superadmin').'/theme_options')) ? 'active' : '' }}"><a href="{{url(Config::get('constants.superadmin').'/theme_options')}}">Theme Options</a></li>
                                <!-- <li class="{{ (request()->is('users')) ? 'active' : '' }}"><a href="{{url('users')}}">Users</a></li>  -->
                            </ul>
                        </li>
                        @else

                        @endif 
						
						
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