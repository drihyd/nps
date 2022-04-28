
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12 col-xl-12">
        <!-- Start row -->
        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body">
                    <div class="media">
                    <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="feather icon-folder"></i></span>
                        <div class="media-body">
                            <p class="mb-0">Total number of organizations</p>
                            <h5 class="mb-0">185</h5>                      
                        </div>
                    </div>
                    </div>
        </div>
    </div>
            <div class="col-lg-4 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body">
                    <div class="media">
                    <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="feather icon-folder"></i></span>
                        <div class="media-body">
                            <p class="mb-0">Group Companies</p>
                            <h5 class="mb-0">80</h5>                      
                        </div>
                    </div>
                    </div>
        </div>
    </div>
            
    <div class="col-lg-4 col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body">
                    <div class="media">
                    <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse"><i class="feather icon-folder"></i></span>
                        <div class="media-body">
                            <p class="mb-0">Single Entities</p>
                            <h5 class="mb-0">185</h5>                      
                        </div>
                    </div>
                    </div>
        </div>
        
        
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
            
    </div>
        <!-- End row -->                        
    </div>
    <!-- End col -->                    
    <!-- Start col -->
    
    <!-- End col -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/deepred/public_html/demos/nps/v1/resources/views/admin/dashboard/show.blade.php ENDPATH**/ ?>