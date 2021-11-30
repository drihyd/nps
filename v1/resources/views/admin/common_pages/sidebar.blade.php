@php
$theme_options_data=DB::table('themeoptions')->get()->first();
@endphp
<div class="leftbar">
            <!-- Start Sidebar -->
            <div class="sidebar">
                <!-- Start Logobar -->
                <div class="logobar">
                    <a href="{{url('/')}}" class="logo logo-large"><img src="{{URL::to('assets/uploads/'.$theme_options_data->header_logo??'')}}" class="img-fluid" alt="logo"></a>
                    <a href="{{url('/')}}" class="logo logo-small"><img src="{{URL::to('assets/uploads/'.$theme_options_data->favicon??'')}}" class="img-fluid" alt="logo"></a>
                </div>
                <!-- End Logobar -->
                <!-- Start Navigationbar -->
                <div class="navigationbar">
                    <ul class="vertical-menu">
                        <li class="{{ (request()->is('dashboard')) ? 'active' : '' }}">
                            <a href="{{url('dashboard')}}">
                                <img src="{{URL::to('assets/images/svg-icon/dashboard.svg')}}" class="img-fluid" alt="widgets"><span>Dashboard</span><!--<span class="badge badge-success pull-right">New</span>-->
                            </a>
                        </li> 
                        
                        @if(auth()->user()->role == 1)
                        <li>
                            <a href="javaScript:void();">
                              <img src="{{URL::to('assets/images/svg-icon/basic.svg')}}" class="img-fluid" alt="apps"><span>Organizations</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li class="{{ (request()->is('organizations')) ? 'active' : '' }}"><a href="{{url('organizations')}}">View all</a></li>
                                <li class="{{ (request()->is('organizations/add-basicinfo')) ? 'active' : '' }}"><a href="{{url('organizations/add-basicinfo')}}">Add New</a></li> 
                            </ul>
                        </li>
                        @elseif(auth()->user()->role == 2)

                        <li>
                            <a href="javaScript:void();">
                              <img src="{{URL::to('assets/images/svg-icon/basic.svg')}}" class="img-fluid" alt="apps"><span>Departments</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li class="{{ (request()->is('departments')) ? 'active' : '' }}"><a href="{{url('organizations')}}">View all</a></li>
                                
                            </ul>
                        </li>
                        @else

                        @endif

                         @if(auth()->user()->role == 1)
                        <li>
                            <a href="javaScript:void();">
                              <img src="{{URL::to('assets/images/svg-icon/maps.svg')}}" class="img-fluid" alt="apps"><span>Settings</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li class="{{ (request()->is('theme_options')) ? 'active' : '' }}"><a href="{{url('theme_options')}}">Theme Options</a></li>
                                <!-- <li class="{{ (request()->is('users')) ? 'active' : '' }}"><a href="{{url('users')}}">Users</a></li>  -->
                            </ul>
                        </li>
                        @else

                        @endif
                        <li>
                            <a href="{{route('admin.logout')}}">
                              <img src="{{URL::to('assets/images/svg-icon/logout.svg')}}" class="img-fluid" alt="apps"><span>Logout</span><i class="feather "></i>
                            </a>
                        </li>
                        
                        

                                                                   
                    </ul>
                </div>
                <!-- End Navigationbar -->
            </div>
            <!-- End Sidebar -->
        </div>