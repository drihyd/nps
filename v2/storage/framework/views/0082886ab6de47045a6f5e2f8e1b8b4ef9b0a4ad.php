<div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <h4 class="page-title">SuperAdmin - Dashboard</h4>
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>">Home</a></li>
                                <li class="breadcrumb-item" active aria-current="page"><a href="#"><?php echo e($pageTitle??''); ?></a></li>
                                
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <?php if(isset($addlink)): ?>
                        <div class="widgetbar">
                            <a href="<?php echo e($addlink??''); ?>" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>ADD</a>
                        </div> 
                        <?php else: ?>

                        &nbsp;
                        <?php endif; ?>                     
                    </div>
                </div>          
            </div><?php /**PATH /home/deepred/public_html/demos/nps/v1/resources/views/admin/common_pages/breadcrump.blade.php ENDPATH**/ ?>