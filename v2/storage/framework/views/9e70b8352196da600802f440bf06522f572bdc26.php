<div class="leftbar">
<!-- Start Sidebar -->
<div class="sidebar">
<!-- Start Logobar -->
<div class="logobar">
<a href="<?php echo e(url(Config::get('constants.admin').'/dashboard')); ?>" class="logo logo-large"><img src="<?php echo e(URL::to('assets/uploads/'.$theme_options_data->header_logo??'')); ?>" class="img-fluid" alt="logo"></a>
<a href="<?php echo e(url(Config::get('constants.admin').'/dashboard')); ?>" class="logo logo-small"><img src="<?php echo e(URL::to('assets/uploads/'.$theme_options_data->favicon??'')); ?>" class="img-fluid" alt="logo"></a>
</div>
<!-- End Logobar -->
<!-- Start Navigationbar -->
<div class="navigationbar">
<ul class="vertical-menu">
<li class="<?php echo e((request()->is(Config::get('constants.admin').'/dashboard')) ? 'active' : ''); ?>">
<a href="<?php echo e(url(Config::get('constants.admin').'/dashboard')); ?>">
<img src="<?php echo e(URL::to('assets/images/svg-icon/dashboard.svg')); ?>" class="img-fluid" alt="widgets"><span>Dashboard</span><!--<span class="badge badge-success pull-right">New</span>-->
</a>
</li> 

<li class="<?php echo e((request()->is(Config::get('constants.admin').'/responses')) ? 'active' : ''); ?>">
<a href="<?php echo e(url(Config::get('constants.admin').'/responses')); ?>">
<img src="<?php echo e(URL::to('assets/images/svg-icon/basic.svg')); ?>" class="img-fluid" alt="apps"><span>View Responses</span><i class="feather"></i>
</a>
</li>


<li class="<?php echo e((request()->is(Config::get('constants.admin').'/feedback')) ? 'active' : ''); ?>">
<a href="<?php echo e(URL(Config::get('constants.admin').'/survey')); ?>" target="_blank">
<!--<a href="<?php echo e(URL(Config::get('constants.admin').'/survey/start/'.Crypt::encryptString(1))); ?>" target="_blank">-->
<img src="<?php echo e(URL::to('assets/images/svg-icon/basic.svg')); ?>" class="img-fluid" alt="apps"><span>Take Feedback</span><i class="feather"></i>
</a>
</li>



<li class="<?php echo e((request()->is(Config::get('constants.admin').'/users')) ? 'active' : ''); ?>">
<a href="<?php echo e(url(Config::get('constants.admin').'/users')); ?>">
<img src="<?php echo e(URL::to('assets/images/svg-icon/user.svg')); ?>" class="img-fluid" alt="apps"><span>Users</span><i class="feather"></i>
</a>
</li>
<!-- <li class="<?php echo e((request()->is(Config::get('constants.admin').'/questionnaire')) ? 'active' : ''); ?>">
<a href="<?php echo e(url(Config::get('constants.admin').'/questionnaire')); ?>"><img src="<?php echo e(URL::to('assets/images/svg-icon/basic.svg')); ?>" class="img-fluid" alt="apps"><span>Questionaire</span><i class="feather"></i></a>
</li> -->


<li>
<a href="javaScript:void();">
<img src="<?php echo e(URL::to('assets/images/svg-icon/basic.svg')); ?>" class="img-fluid" alt="apps"><span>Teams</span><i class="feather icon-chevron-right pull-right"></i>
</a>
<ul class="vertical-submenu">
<li class="<?php echo e((request()->is(Config::get('constants.admin').'/departments')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/departments')); ?>">All Teams</a></li>
<li class="<?php echo e((request()->is(Config::get('constants.admin').'/activities')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/activities')); ?>">All Activities</a></li>
</ul>
</li>
<li>
<a href="javaScript:void();">
<img src="<?php echo e(URL::to('assets/images/svg-icon/basic.svg')); ?>" class="img-fluid" alt="apps"><span>Group Levels</span><i class="feather icon-chevron-right pull-right"></i>
</a>
<ul class="vertical-submenu">
<li class="<?php echo e((request()->is(Config::get('constants.admin').'/designations')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/designations')); ?>">Designations</a></li>
<li class="<?php echo e((request()->is(Config::get('constants.admin').'/designation_levels')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/designation_levels')); ?>">Designation Levels</a></li>
<li class="<?php echo e((request()->is(Config::get('constants.admin').'/designation_roles')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/designation_roles')); ?>">Designation Roles</a></li>
</ul>
</li>

<li>
<a href="javaScript:void();">
<img src="<?php echo e(URL::to('assets/images/svg-icon/basic.svg')); ?>" class="img-fluid" alt="apps"><span>Configure</span><i class="feather icon-chevron-right pull-right"></i>
</a>
<ul class="vertical-submenu">

<li class="<?php echo e((request()->is(Config::get('constants.admin').'/questionnaire')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/questionnaire')); ?>">Questionnaire</a></li>


<li class="<?php echo e((request()->is(Config::get('constants.admin').'/questions')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/questions')); ?>">Questions</a></li>

<li class="<?php echo e((request()->is(Config::get('constants.admin').'/sla_configurations')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/sla_configurations')); ?>">SLA Configurations</a></li>
<li class="<?php echo e((request()->is(Config::get('constants.admin').'/customer_fields_configurables')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/customer_fields_configurables')); ?>">Customer Fields</a></li>
<!--<li class="<?php echo e((request()->is(Config::get('constants.admin').'/questions_options')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/questions_options')); ?>">Questions Options</a></li>-->
</ul>
</li>

<li>
<a href="javaScript:void();">
<img src="<?php echo e(URL::to('assets/images/svg-icon/basic.svg')); ?>" class="img-fluid" alt="apps"><span>Settings</span><i class="feather icon-chevron-right pull-right"></i>
</a>
<ul class="vertical-submenu">
<li class="<?php echo e((request()->is(Config::get('constants.admin').'/notifications')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.admin').'/notifications')); ?>">Gateway</a></li>
</ul>
</li>

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
</div><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/common_pages/manager_sidebar.blade.php ENDPATH**/ ?>