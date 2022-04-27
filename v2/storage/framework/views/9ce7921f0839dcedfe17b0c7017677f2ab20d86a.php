<div class="row">

                    <div class="col-md-10">
                        <div class="mailbox mb-5">
                            <div class="message-center message-body row">
                                <!-- Message -->          
                                <?php $__currentLoopData = $organizations_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>           
                                <div class="col-12 col-md-6 mb-4">
                                    <div class="card rounded-1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a target="_blank" href="<?php echo e(url(Config::get('constants.superadmin').'/switch/'.$organization->slug.'/'.Crypt::encryptString($organization->id) )); ?>" class="message-item border-0">                                            
                                            <span class="user-img">
                                                <?php if(isset($organization->brand_logo) && !empty($organization->brand_logo)): ?>
                                                <img src="<?php echo e(URL::to('assets/uploads/'.$organization->brand_logo??'')); ?>" alt="" class="rounded-circle">
                                                <?php else: ?>
                                                    <img src="<?php echo e(URL::to('assets/img/dummylogo.png')); ?>" alt="" class="rounded-circle">
                                                <?php endif; ?>  
                                            </span>
                                            <span class="mail-contnet">
                                                <h5 class="message-title"><?php echo e($organization->short_name??''); ?></h5> <span class="mail-desc text-muted"><?php echo e($organization->company_name??''); ?></span> </span>
                                        </a>
                                            </div>
                                
                                        </div>
                                        
                                           
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <!-- Message -->
                                

                            </div>
                        </div>
                    </div>
                </div>
        <!-- Start row -->
        <!-- <div class="row">
            <div class="col-lg-4 col-xl-4">

                <a href="<?php echo e(url(Config::get('constants.superadmin').'/organizations')); ?>">
                <div class="card m-b-30">
                    <div class="card-body">
                    <div class="media">
                    <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="feather icon-folder"></i></span>
                        <div class="media-body">
                            <p class="mb-0">Total number of organizations</p>
                            <h5 class="mb-0"><?php echo e($all_organizations??''); ?></h5>                      
                        </div>
                    </div>
                    </div>
        </div>
    </a>
    </div>
            <div class="col-lg-4 col-xl-4">
                <a href="<?php echo e(url(Config::get('constants.superadmin').'/organizations')); ?>">
                <div class="card m-b-30">
                    <div class="card-body">
                    <div class="media">
                    <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="feather icon-folder"></i></span>
                        <div class="media-body">
                            <p class="mb-0">Group Companies</p>
                            <h5 class="mb-0"><?php echo e($all_group??''); ?></h5>                      
                        </div>
                    </div>
                    </div>
                </div>
                </a>
    </div>
            
    <div class="col-lg-4 col-xl-4">

                <a href="<?php echo e(url(Config::get('constants.superadmin').'/organizations')); ?>">
                <div class="card m-b-30">
                    <div class="card-body">
                    <div class="media">
                    <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="feather icon-folder"></i></span>
                        <div class="media-body">
                            <p class="mb-0">Single Entities</p>
                            <h5 class="mb-0"><?php echo e($all_single??''); ?></h5>                      
                        </div>
                    </div>
                    </div>
        </div>
        
        </a>
    </div>
            
    <div class="clearfix"></div>
    <div class="col-lg-8 col-xl-8">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Companies on-boarded&nbsp;<small>(Month on Month)</small></h5>
            </div>
            <div class="card-body">
                <div id="apex-line-chart"></div>
            </div>
        </div>
    </div>
            
    <div class="col-lg-4 col-xl-4">
        <div class="card m-b-30" style="min-height:356px">
            <div class="card-header">                                
                <h5 class="card-title mb-0">Validity</h5>
            </div>
            <div class="card-body text-center">
                <div class="course-slider">
                    <div class="course-slider-item">
                        <h4 class="my-0 pull-left">Licenses about expire</h4>
                        <div class="clearfix"></div>
                        <div class="row align-items-center my-4 py-3">
                            <div class="col-4 py-3 bg-danger-rgba rounded">
                                <h4 class="text-danger">2</h4>
                                <p class="text-danger mb-0">Within a week</p>
                            </div>
                            <div class="col-4 py-3 px-0">
                                <h4 class="text-warning">8</h4>
                                <p class="text-warning mb-0">Within a month</p>
                            </div>
                            <div class="col-4 p-0">
                                <h4>21</h4>
                                <p class="mb-0">Within 3 months</p>
                            </div>
                        </div>
                        
                        <div class="row align-items-center">
                            <div class="col-4 text-center">
                               <button class="btn btn-danger">Send Alert</button>
                            </div>
                            <div class="col-4 text-center">
                                <button class="btn btn-warning">Send Alert</button>
                            </div>
                            <div class="col-4 text-center">
                                <button class="btn btn-dark">Send Alert</button>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>                                        
            </div>
        </div>
    </div>
            
    </div> -->
        <!-- End row -->   <?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/dashboard/superadmin_dashboard.blade.php ENDPATH**/ ?>