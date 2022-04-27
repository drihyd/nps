
<?php $__env->startSection('title',$pageTitle); ?>
<?php $__env->startSection('content'); ?>




<div class="row">

<!-- Start col -->


<?php if(isset(auth()->user()->role) && auth()->user()->role!=3): ?>
	
<div class="col-lg-12">
<div class="card m-b-30">
<div class="card-header">                                
<div class="row align-items-center">
<div class="col-12">

<h5 class="card-title mb-2"><?php echo $__env->yieldContent('title'); ?></h5>

<form class="table-filter mb-4 form-inline graph_form" action="<?php echo e(route('filter.primary.drivers')); ?>" method="post" >
<?php echo csrf_field(); ?>
<?php echo $__env->make('admin.common_pages.dates_input', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.common_pages.action_button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
&nbsp;

<div class="form-group mb-2">
<?php if(auth()->user()): ?>
<?php if(auth()->user()->role==2): ?>
<a href="<?php echo e(url(Config::get('constants.admin').'/graph-primary-drivers')); ?>" class="btn btn-warning btn-sm ">Reset</a>
<?php else: ?>
<a href="<?php echo e(url(Config::get('constants.user').'/graph-primary-drivers')); ?>" class="btn btn-warning btn-sm">Reset</a>
<?php endif; ?>
<?php else: ?>
<a href="#">
<?php endif; ?>
</div>

</form>




</div>
</div>
</div>
</div>
</div>








<div class="col-lg-12">
<div class="card m-b-30">
<div class="card-header">
<h5 class="card-title"><?php echo $__env->yieldContent('title'); ?></h5>
</div>
<div class="card-body">
<div id="c3-stacked-bar-department-nps" style="height:400px;"></div>
</div>
</div>
</div>
<?php endif; ?>  

</div>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('scripts'); ?>

<script type="text/javascript">


/************* Test Graphs *****/
  $(document).ready(function() {


/* -- Chartistjs - Department Bar Chart -- */
 var stackedBarChart = c3.generate({
        bindto: '#c3-stacked-bar-department-nps',
        color: { pattern: ["<?php echo e(Config::get('constants.Detractors')); ?>","<?php echo e(Config::get('constants.Passives')); ?>","<?php echo e(Config::get('constants.Promoters')); ?>"] },
        data: {
			
			
            columns: [
                ["<?php echo e(Config::get('constants.Detractors-label')); ?>", <?php echo $_dep_scors[1]??'' ?>],
                ["<?php echo e(Config::get('constants.Passives-label')); ?>", <?php echo $_dep_scors[2]??'' ?>],
                ["<?php echo e(Config::get('constants.Promoters-label')); ?>", <?php echo $_dep_scors[3]??'' ?>],
			
				
            ],
            type: 'bar',
           groups: [
                ["<?php echo e(Config::get('constants.Detractors-label')); ?>","<?php echo e(Config::get('constants.Passives-label')); ?>","<?php echo e(Config::get('constants.Promoters-label')); ?>"]
            ]
			
			
			
        },
  
		
		axis: {
    x: {
      type: 'category',
      categories: [<?php echo $_dep_scors[0]??'' ?>]
    }
  },
  
  
   options: {
	   
	   
	      responsive: true,  
                cutoutPercentage: 5,              
                legend: {
                    position: 'left'
                },
           
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
	   
                    title: {
                        display: false,
                        text: ''
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
                            gridLines: {
                                color: 'rgba(220, 220, 220, 1)',
                                lineWidth: 1,
                                borderDash: [0]
                            }
                        }],
                        yAxes: [{
                            stacked: true,
                            gridLines: {
                                color: 'rgba(220, 220, 220, 1)',
                                lineWidth: 1,
                                borderDash: [0]
                            }
                        }],
						
						
                    }
                }
  
			
});

});


</script>



<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/graphs/graphs_primary_drivers.blade.php ENDPATH**/ ?>