<div class="leftbar">
<!-- Start Sidebar -->
<div class="sidebar">
<!-- Start Logobar -->
<div class="logobar">
<a href="<?php echo e(url(Config::get('constants.optlhead').'/dashboard')); ?>" class="logo logo-large"><img src="<?php echo e(URL::to('assets/uploads/'.$theme_options_data->header_logo??'')); ?>" class="img-fluid" alt="logo"></a>
<a href="<?php echo e(url(Config::get('constants.optlhead').'/dashboard')); ?>" class="logo logo-small"><img src="<?php echo e(URL::to('assets/uploads/'.$theme_options_data->favicon??'')); ?>" class="img-fluid" alt="logo"></a>
</div>
<!-- End Logobar -->
<!-- Start Navigationbar -->
<div class="navigationbar">
<ul class="vertical-menu">
<li class="<?php echo e((request()->is(Config::get('constants.optlhead').'/dashboard')) ? 'active' : ''); ?>">
<a href="<?php echo e(url(Config::get('constants.optlhead').'/dashboard')); ?>">
<img src="<?php echo e(URL::to('assets/images/svg-icon/dashboard.svg')); ?>" class="img-fluid" alt="widgets"><span>Dashboard</span><!--<span class="badge badge-success pull-right">New</span>-->
</a>
</li> 

<li class="<?php echo e((request()->is(Config::get('constants.optlhead').'/responses')) ? 'active' : ''); ?>">
<a href="<?php echo e(url(Config::get('constants.optlhead').'/responses')); ?>">
<img src="<?php echo e(URL::to('assets/images/svg-icon/basic.svg')); ?>" class="img-fluid" alt="apps"><span>View Responses</span><i class="feather"></i>
</a>
</li>


<li class="<?php echo e((request()->is(Config::get('constants.optlhead').'/optlhead/survey/start')) ? 'active' : ''); ?>">
<a href="<?php echo e(URL(Config::get('constants.optlhead').'/survey')); ?>" target="_blank">
<img src="<?php echo e(URL::to('assets/images/svg-icon/basic.svg')); ?>" class="img-fluid" alt="apps"><span>Take Feedback</span><i class="feather"></i>
</a>
</li>


<li>
<a href="javaScript:void();">
<i class="dripicons-graph-pie"></i><span>Reports</span><i class="feather icon-chevron-right pull-right"></i>
</a>
<ul class="vertical-submenu">
<li class="<?php echo e((request()->is(Config::get('constants.optlhead').'/responses_reports/?ticket_status=patient_level_closure')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.optlhead').'/responses_reports/?ticket_status=patient_level_closure')); ?>">Patient Closure</a></li>
<li class="<?php echo e((request()->is(Config::get('constants.optlhead').'/responses_reports/?ticket_status=process_level_closure')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.optlhead').'/responses_reports/?ticket_status=process_level_closure')); ?>">Process Closure</a></li>
</ul>
</li>

<li>
<a href="javaScript:void();">
<img src="<?php echo e(URL::to('assets/images/svg-icon/chart.svg')); ?>" class="img-fluid" alt="widgets"><span>Graphs</span><i class="feather icon-chevron-right pull-right"></i>
</a>
<ul class="vertical-submenu">
<li class="<?php echo e((request()->is(Config::get('constants.optlhead').'/graphs')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.hod').'/graphs')); ?>">Dashboard 1</a></li>
<li class="<?php echo e((request()->is(Config::get('constants.optlhead').'/graphs-in-patient')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.hod').'/graphs-in-patient')); ?>">Dashboard 2</a></li>
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
</div><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/common_pages/operantionalhead_sidebar.blade.php ENDPATH**/ ?>