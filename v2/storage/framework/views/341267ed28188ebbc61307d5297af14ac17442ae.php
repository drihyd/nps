
<?php $__env->startSection('title', $pageTitle); ?>
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

<form class="table-filter mb-4 form-inline graph_form" action="<?php echo e(route('filter.nps.graph')); ?>" method="post" >
<?php echo csrf_field(); ?>
<?php echo $__env->make('admin.common_pages.dates_input', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.common_pages.action_button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
&nbsp;

<div class="form-group mb-2">
<?php if(auth()->user()): ?>
<?php if(auth()->user()->role==2): ?>
<a href="<?php echo e(url(Config::get('constants.admin').'/nps-graph')); ?>" class="btn btn-warning btn-sm ">Reset</a>
<?php else: ?>
<a href="<?php echo e(url(Config::get('constants.user').'/nps-graph')); ?>" class="btn btn-warning btn-sm">Reset</a>
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
<div id="c3-stacked-bar-nps" style="height:400px;" class="chartjs-chart"></div>
</div>
</div>
</div>

<?php endif; ?>  

</div>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('scripts'); ?>

<script type="text/javascript">
  $(document).ready(function() {

 /* -- NPS Score Bar Chart -- */ 	 
    var stackedBarChart = c3.generate({
        bindto: '#c3-stacked-bar-nps',
        color: { pattern: ["<?php echo e(Config::get('constants.NPS')); ?>"] },
        data: {
            columns: [
				["<?php echo e(Config::get('constants.Nps-label')); ?>", <?php echo $nps_count??'' ?>],
            ],
            type: 'bar',
         },
		axis: {
    x: {
      type: 'category',
      categories: [<?php echo $monthnames ?>]
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
                },
		
		
  
			
});



/* ----- END NPS Score Bar Chart -- */


});




</script>



<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/graphs/nps-graph.blade.php ENDPATH**/ ?>