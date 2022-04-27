<div class="leftbar">
<!-- Start Sidebar -->
<div class="sidebar">
<!-- Start Logobar -->
<div class="logobar">
<a href="<?php echo e(url(Config::get('constants.user').'/dashboard')); ?>" class="logo logo-large"><img src="<?php echo e(URL::to('assets/uploads/'.$theme_options_data->header_logo??'')); ?>" class="img-fluid" alt="logo"></a>
<a href="<?php echo e(url(Config::get('constants.user').'/dashboard')); ?>" class="logo logo-small"><img src="<?php echo e(URL::to('assets/uploads/'.$theme_options_data->favicon??'')); ?>" class="img-fluid" alt="logo"></a>
</div>
<!-- End Logobar -->
<!-- Start Navigationbar -->
<div class="navigationbar">
<ul class="vertical-menu">
<li class="<?php echo e((request()->is(Config::get('constants.user').'/dashboard')) ? 'active' : ''); ?>">
<a href="<?php echo e(url(Config::get('constants.user').'/dashboard')); ?>">
<img src="<?php echo e(URL::to('assets/images/svg-icon/dashboard.svg')); ?>" class="img-fluid" alt="widgets"><span>Dashboard</span><!--<span class="badge badge-success pull-right">New</span>-->
</a>
</li> 

<li class="<?php echo e((request()->is(Config::get('constants.user').'/responses')) ? 'active' : ''); ?>">
<a href="<?php echo e(url(Config::get('constants.user').'/responses')); ?>">
<img src="<?php echo e(URL::to('assets/images/svg-icon/basic.svg')); ?>" class="img-fluid" alt="apps"><span>View Responses</span><i class="feather"></i>
</a>
</li>


<li class="<?php echo e((request()->is(Config::get('constants.user').'/user/survey/start')) ? 'active' : ''); ?>">
<a href="<?php echo e(URL(Config::get('constants.user').'/survey/start/'.Crypt::encryptString(1))); ?>" target="_blank">
<img src="<?php echo e(URL::to('assets/images/svg-icon/basic.svg')); ?>" class="img-fluid" alt="apps"><span>Take Feedback</span><i class="feather"></i>
</a>
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
</div><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/common_pages/user_sidebar.blade.php ENDPATH**/ ?>