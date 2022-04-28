
<?php $__env->startSection('title', 'Open and closed actions'); ?>
<?php $__env->startSection('content'); ?>




<div class="row">
    <div class="col-lg-12 col-xl-12">
	
	
	

	
	<div class="card m-b-30">
<div class="card-header">                                
<div class="row align-items-center">
<div class="col-12">

<h5 class="card-title mb-2"><?php echo $__env->yieldContent('title'); ?></h5>

<form class="table-filter mb-4 form-inline graph_form" action="<?php echo e(route('filter-grpahs-opened-closed-actions')); ?>" method="post" >
<?php echo csrf_field(); ?>
<?php echo $__env->make('admin.common_pages.dates_input', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.common_pages.action_button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
&nbsp;

<div class="form-group mb-2">
<?php if(auth()->user()): ?>
<?php if(auth()->user()->role==2): ?>
<a href="<?php echo e(url(Config::get('constants.admin').'/graphs')); ?>" class="btn btn-warning btn-sm ">Reset</a>
<?php else: ?>
<a href="<?php echo e(url(Config::get('constants.user').'/graphs')); ?>" class="btn btn-warning btn-sm">Reset</a>
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



<div class="row align-items-center">
	
<div class="col-12">
<div class="card m-b-30">
<div class="card-body py-0 pl-0">
<div id="open-closed-actions-chart"></div>
</div>
</div>
</div>



<!--

<?php if($department_statistics): ?>

<div class="col-lg-12 col-xl-12">


                        <div class="card m-b-30 dash-widget">
                            <div class="card-header">                                
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h5 class="card-title mb-0">Stastics</h5>
                                    </div>
                               
                                </div>
                            </div>
                            <div class="card-body py-0">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
									
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">S.No.</th>
                                                <th scope="col">Team/Department</th>
                                                <th scope="col">Alerts that came in</th>
                                                <th scope="col">Alerts that are closed</th>
                                                <th scope="col">Alerts that are assigned bu still open</th>
                                           
                                            </tr>
                                        </thead>
                                        <tbody>
										
										<?php $__currentLoopData = $department_statistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										
<?php
$teamname = DB::table('question_options')->select('option_value')->where('id',$item->department_name_id)->get()->first();
?>

										
												<td><?php echo e($loop->iteration); ?></td>
												
                                                <td align="left"><?php echo e($teamname->option_value??''); ?></td>
                                                <td align="center"><?php echo e($item->alerts_came_in??''); ?></td>
                                                <td align="center"><?php echo e($item->alerts_closed??''); ?></td>
                                                <td align="center"><?php echo e($item->alerts_still_opened??''); ?></td>
                                        
                                            </tr>
                                     
											
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>




<?php else: ?>

<?php endif; ?>
-->












		 
		 
		 
		  </div>
		
    </div>
</div>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('scripts'); ?>



<script>
  
  
 

$(document).ready(function() {
 
 console.log("<?php echo $monthnames ?>");
  
	  
      /* -----  Chartistjs - Stacked Bar Chart -- */
      var options = {
		  
		  
          series: [{
          name: 'Opened',
          data: [ 
		  <?php echo e($action_count??""); ?> ]
        }, {
          name: 'Closed',
          data: [ <?php echo e($closed_action_count??""); ?> ]
        }],
		
		
		
		 
          chart: {
          type: 'bar',
		  
		  
		  
		  
		  
          height: 400,
          stacked: true,
          toolbar: {
            show: false
          },
          zoom: {
            enabled: false
          }
        },
        responsive: [{
          breakpoint: 480,
          options: {
            legend: {
              position: 'bottom',
              offsetX: -100,
              offsetY: 0
            }
          }
        }],
		colors: ['#106b21', '#ff0000'],
		
        plotOptions: {
          bar: {
            horizontal: false,
          },
        },
		
		
		
		
        xaxis: {
			showLabel: true,
         
		 type:'string', 
				
          categories:   [<?php echo $monthnames ?>]
		  
		  
        },
        legend: {
          position: 'top',
          offsetY: 0,
          show: true
        },
        fill: {
          opacity: 1
        }
        };

        var chart = new ApexCharts(document.querySelector("#open-closed-actions-chart"), options);
        chart.render();
	  
	  
	          
});



  
  </script>

<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/graphs/graphs_lists.blade.php ENDPATH**/ ?>