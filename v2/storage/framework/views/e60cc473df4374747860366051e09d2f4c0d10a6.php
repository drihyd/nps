<div class="leftbar">
            <!-- Start Sidebar -->
            <div class="sidebar">
                <!-- Start Logobar -->    			
				<?php echo $__env->make('admin.common_pages.header_logos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>		   
                <!-- End Logobar -->
                <!-- Start Navigationbar -->
                <div class="navigationbar">
                    <ul class="vertical-menu">
					
                        <li class="<?php echo e((request()->is(Config::get('constants.superadmin').'/dashboard')) ? 'active' : ''); ?>">
                            <a href="<?php echo e(url(Config::get('constants.superadmin').'/dashboard')); ?>">
                                <img src="<?php echo e(URL::to('assets/images/svg-icon/dashboard.svg')); ?>" class="img-fluid" alt="widgets"><span>Dashboard</span><!--<span class="badge badge-success pull-right">New</span>-->
                            </a>
                        </li> 
                        
                        <?php if(Auth::check() && auth()->user()->role == 1 ): ?>
                        <li>
                            <a href="javaScript:void();">
                              <img src="<?php echo e(URL::to('assets/images/svg-icon/basic.svg')); ?>" class="img-fluid" alt="apps"><span>Organizations</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li class="<?php echo e((request()->is(Config::get('constants.superadmin').'/organizations')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.superadmin').'/organizations')); ?>">View all</a></li>
                                <li class="<?php echo e((request()->is(Config::get('constants.superadmin').'/organizations/add-basicinfo')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.superadmin').'/organizations/add-basicinfo')); ?>">Add New</a></li>
								
                                <li class="<?php echo e((request()->is(Config::get('constants.superadmin').'/admin-users')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.superadmin').'/admin-users')); ?>">Admin Users</a></li> 
                            </ul>
                        </li>
                       

	<?php endif; ?>

	<?php if(Auth::check() &&  auth()->user()->role == 1 && Session::get('companyID')>0): ?>
	<li class="<?php echo e((request()->is(Config::get('constants.admin').'/responses')) ? 'active' : ''); ?>">
	<a href="<?php echo e(url(Config::get('constants.admin').'/responses')); ?>">
	<i class="dripicons-article"></i><span>View Responses</span><i class="feather"></i>
	</a>
	</li>
	<?php else: ?>

	<?php endif; ?> 	

<?php if(Auth::check() &&  auth()->user()->role == 1  && Session::get('companyID')>0): ?>
<li>
<a href="javaScript:void();">
<i class="dripicons-graph-pie"></i><span>Reports</span><i class="feather icon-chevron-right pull-right"></i>
</a>
<ul class="vertical-submenu">
<li class="<?php echo e((request()->is(Config::get('constants.admin').'/nps-graph')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/nps-graph')); ?>">NPS Graph</a></li>
<li class="<?php echo e((request()->is(Config::get('constants.admin').'/feedback-composition')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/feedback-composition')); ?>">NPS Composition</a></li>

<li class="<?php echo e((request()->is(Config::get('constants.admin').'/graph-primary-drivers')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/graph-primary-drivers')); ?>">Primary Drivers</a></li>
<li class="<?php echo e((request()->is(Config::get('constants.admin').'/graph-secondary-drivers')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/graph-secondary-drivers')); ?>">Secondary Drivers</a></li>
	
<!-- 
<li class="<?php echo e((request()->is(Config::get('constants.admin').'/responses_reports/?ticket_status=all')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/responses_reports/?ticket_status=all')); ?>">Detractors Reports</a></li>
<li class="<?php echo e((request()->is(Config::get('constants.admin').'/responses_reports/?ticket_status=new-cases')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/responses_reports/?ticket_status=new-cases')); ?>">New Cases</a></li>
<li class="<?php echo e((request()->is(Config::get('constants.admin').'/responses_reports/?ticket_status=assigned-cases')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/responses_reports/?ticket_status=assigned-cases')); ?>">Assigned Cases</a></li>
<li class="<?php echo e((request()->is(Config::get('constants.admin').'/responses_reports/?ticket_status=closed-cases')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/responses_reports/?ticket_status=closed-cases')); ?>">Closed Cases</a></li>
<li class="<?php echo e((request()->is(Config::get('constants.admin').'/performitor_reports')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/performitor_reports')); ?>">Performitors Reports</a></li>
-->
</ul>
</li>
                        <?php else: ?>

                        <?php endif; ?>
						
						
												<?php if(Auth::check() &&  auth()->user()->role == 1 && Session::get('companyID')>0): ?>
                        <li>
                            <a href="javaScript:void();">
                              <img src="<?php echo e(URL::to('assets/images/svg-icon/maps.svg')); ?>" class="img-fluid" alt="apps"><span>Masters</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
							
							
							<li class="<?php echo e((request()->is(Config::get('constants.admin').'/departments')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/departments')); ?>">All Teams</a></li>
<li class="<?php echo e((request()->is(Config::get('constants.admin').'/activities')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/activities')); ?>">All Activities</a></li>
							

                                <!-- <li class="<?php echo e((request()->is('users')) ? 'active' : ''); ?>"><a href="<?php echo e(url('users')); ?>">Users</a></li>  -->
								
								<li class="<?php echo e((request()->is(Config::get('constants.admin').'/process')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/process')); ?>">Process</a></li>
<li class="<?php echo e((request()->is(Config::get('constants.admin').'/specifications')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/specifications')); ?>">Specialities</a></li>
<li class="<?php echo e((request()->is(Config::get('constants.admin').'/doctors')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/doctors')); ?>">Doctors</a></li>
<li class="<?php echo e((request()->is(Config::get('constants.admin').'/wards')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/wards')); ?>">Wards</a></li>

                                <li class="<?php echo e((request()->is(Config::get('constants.superadmin').'/theme_options')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.superadmin').'/theme_options')); ?>">Theme Options</a></li>
                            </ul>
                        </li>
                        <?php else: ?>

                        <?php endif; ?> 
						
						
                        <li>
                            <a href="<?php echo e(route('session.logout')); ?>">
                              <img src="<?php echo e(URL::to('assets/images/svg-icon/logout.svg')); ?>" class="img-fluid" alt="apps"><span>Logout</span><i class="feather "></i>
                            </a>
                        </li>
                        
                        

                                                                   
                    </ul>
                </div>
                <!-- End Navigationbar -->
            </div>
            <!-- End Sidebar -->
        </div><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/common_pages/sidebar.blade.php ENDPATH**/ ?>