
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">

                    <div class="col-md-10">
                        <div class="mailbox mb-5">
                            <div class="message-center message-body row">
                                <!-- Message -->          
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>           
                                <div class="col-12 col-md-6 mb-4">
                                    <div class="card rounded-1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="<?php echo e(url(Config::get('constants.superadmin').'/organizations/edit/'.Crypt::encryptString($organization->id) )); ?>" class="message-item border-0">                                            
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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "<?php echo e(route('organizations_lists.index')); ?>",
        columns: [
            {data: 'short_name', name: 'short_name'},
            {data: 'entity_group', name: 'entity_group'},
            {data: 'city', name: 'city'},          
            {data: 'license_startdate', name: 'license_startdate'},
            // {data: 'license_startdate', name: 'license_startdate'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    
    
  });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/organizations/organizations_list.blade.php ENDPATH**/ ?>