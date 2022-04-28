
        <!-- Start row -->
        <div class="row">

	
	<?php echo $__env->make('admin.dashboard.dashboard_card_count', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


	
	
	
</div>
           <div class="row"> 
    <div class="clearfix"></div>
    <!-- Start col -->
	
	
	<?php echo $__env->make('admin.dashboard.graph_nps_count', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
	<?php echo $__env->make('admin.dashboard.split_nps_count', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
	

        <!-- End col -->
            
 
            
    </div>
        <!-- End row --> <?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/dashboard/user_dashboard.blade.php ENDPATH**/ ?>