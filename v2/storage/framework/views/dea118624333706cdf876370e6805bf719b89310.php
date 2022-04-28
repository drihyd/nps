<div class="leftbar">
            <!-- Start Sidebar -->
            <div class="sidebar">
                <!-- Start Logobar -->
                <div class="logobar">
                    <a href="#" class="logo logo-large"><img src="<?php echo e(URL::to('assets/uploads/'.$theme_options_data->header_logo??'')); ?>" class="img-fluid" alt="logo"></a>
                    <a href="#" class="logo logo-small"><img src="<?php echo e(URL::to('assets/uploads/'.$theme_options_data->favicon??'')); ?>" class="img-fluid" alt="logo"></a>
                </div>
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

                         <?php if(Auth::check() &&  auth()->user()->role == 1): ?>
                        <li>
                            <a href="javaScript:void();">
                              <img src="<?php echo e(URL::to('assets/images/svg-icon/maps.svg')); ?>" class="img-fluid" alt="apps"><span>Settings</span><i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li class="<?php echo e((request()->is(Config::get('constants.superadmin').'/theme_options')) ? 'active' : ''); ?>"><a href="<?php echo e(url(Config::get('constants.superadmin').'/theme_options')); ?>">Theme Options</a></li>
                                <!-- <li class="<?php echo e((request()->is('users')) ? 'active' : ''); ?>"><a href="<?php echo e(url('users')); ?>">Users</a></li>  -->
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
        </div><?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/admin/common_pages/sidebar.blade.php ENDPATH**/ ?>