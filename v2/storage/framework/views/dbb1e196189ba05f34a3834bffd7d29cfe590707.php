
<?php $__env->startSection('title', 'Graphs In-Patient'); ?>
<?php $__env->startSection('content'); ?>




<div class="row">

<!-- Start col -->


<?php if(isset(auth()->user()->role) && auth()->user()->role!=3): ?>
<div class="col-lg-12">
<div class="card m-b-30">
<div class="card-header">
<h5 class="card-title">The Net Promoter Score (NPS)</h5>
</div>
<div class="card-body">
<div id="c3-stacked-bar-nps" style="height:400px;"></div>
</div>
</div>
</div>
<?php endif; ?>

<div class="col-lg-6">
<div class="card m-b-30">
<div class="card-header">
<h5 class="card-title">Departments Statistics</h5>
</div>
<div class="card-body">
<div id="c3-stacked-bar-department-nps" style="height:400px;"></div>
</div>
</div>
</div>
	  

<div class="col-lg-6">
<div class="card m-b-30">
<div class="card-header">
<h5 class="card-title">Department Activities Statistics</h5>
</div>
<div class="card-body">
<div id="c3-stacked-bar-department-activities-nps" style="height:400px;"></div>
</div>
</div>
</div>


<div class="col-lg-6">
<div class="card m-b-30">
<div class="card-header">
<h5 class="card-title">Patient & Process Closure Statistics</h5>
</div>
<div class="card-body">
<div id="c3-stacked-bar-patient-process-closure" style="height:400px;"></div>
</div>
</div>
</div>

<div class="col-lg-6">
<div class="card m-b-30">
<div class="card-header">
<h5 class="card-title">Category of Process Closure Statistics</h5>
</div>
<div class="card-body">
<div id="c3-stacked-bar-cat-process-closure" style="height:400px;"></div>
</div>
</div>
</div>
	  
	  
	  

	  

</div>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('scripts'); ?>

<script type="text/javascript">
  $(document).ready(function() {

 /* -- NPS Score Bar Chart -- */ 	 



    var stackedBarChart = c3.generate({
		
		
	
		
        bindto: '#c3-stacked-bar-nps',
        color: { pattern: ["<?php echo e(Config::get('constants.Detractors')); ?>","<?php echo e(Config::get('constants.Passives')); ?>","<?php echo e(Config::get('constants.Promoters')); ?>","<?php echo e(Config::get('constants.NPS')); ?>"] },
        data: {
            columns: [
                ["<?php echo e(Config::get('constants.Detractors-label')); ?>", <?php echo $detractors_count??'' ?>],
                ["<?php echo e(Config::get('constants.Passives-label')); ?>", <?php echo $passives_count??'' ?>],
                ["<?php echo e(Config::get('constants.Promoters-label')); ?>", <?php echo $promotors_count??'' ?>],
                ["<?php echo e(Config::get('constants.Nps-label')); ?>", <?php echo $nps_count??'' ?>],         
            ],
            type: 'bar',
            groups: [
                ["<?php echo e(Config::get('constants.Detractors-label')); ?>","<?php echo e(Config::get('constants.Passives-label')); ?>","<?php echo e(Config::get('constants.Promoters-label')); ?>"]
            ],
			
			
        },
		
		

  
		
		axis: {
    x: {
      type: 'category',
      categories: [<?php echo $monthnames ?>]
    }
  },
  
  
   options: {
	 
	      responsive: true,  
                cutoutPercentage: 0,              
                legend: {
                    position: 'left'
                },
           
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
	   
                    title: {
                        display: false,
                        text: 'NPS Score'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
					
					click: test,
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
                        }]
                    },
					
					
					
					
					

                }
  
			
});



/* -----  Chartistjs - Stacked Bar Chart -- */
  



});

/************* Test Graphs *****/



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
                cutoutPercentage: 20,              
                legend: {
                    position: 'left'
                },
           
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
	   
                    title: {
                        display: false,
                        text: 'NPS Score'
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






/* -- Chartistjs - Department Activities Horizontal Bar Chart -- */
 var stackedBarChart = c3.generate({
        bindto: '#c3-stacked-bar-department-activities-nps',
        color: { pattern: ["<?php echo e(Config::get('constants.Detractors')); ?>","<?php echo e(Config::get('constants.Passives')); ?>","<?php echo e(Config::get('constants.Promoters')); ?>"] },
        data: {
			
			
            columns: [
                ["<?php echo e(Config::get('constants.Detractors-label')); ?>", <?php echo $_dep_act_scors[1]??'' ?>],
                ["<?php echo e(Config::get('constants.Passives-label')); ?>", <?php echo $_dep_act_scors[2]??'' ?>],
                ["<?php echo e(Config::get('constants.Promoters-label')); ?>", <?php echo $_dep_act_scors[3]??'' ?>],
			
				
            ],
            type: 'bar',
           groups: [
                ["<?php echo e(Config::get('constants.Detractors-label')); ?>","<?php echo e(Config::get('constants.Passives-label')); ?>","<?php echo e(Config::get('constants.Promoters-label')); ?>"]
            ]
			
			
			
        },
  
		
		axis: {
    x: {
      type: 'category',
      categories: [<?php echo $_dep_act_scors[0]??'' ?>]
    }
  },
  
  
   options: {
	   
	   
	      responsive: true,  
                cutoutPercentage: 20,              
                legend: {
                    position: 'left'
                },
           
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
	   
                    title: {
                        display: false,
                        text: 'NPS Score'
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








     new Chartist.Bar('#c3-stacked-bar-patient-process-closure', {
        labels: [<?php echo $_patient_process[0]??'' ?>],
        series: [<?php echo $_patient_process[1]??'' ?>]
      }, {
        distributeSeries: true,
        plugins: [
          Chartist.plugins.tooltip()
        ]
      });


/* -- Chartistjs - Department Activities Horizontal Bar Chart -- */





/* -- Chartistjs - Distributed Series Chart -- */
      new Chartist.Bar('#c3-stacked-bar-cat-process-closure', {
        labels: [<?php echo $_category_process[0]??'' ?>],
        series: [<?php echo $_category_process[1]??'' ?>]
      }, {
        distributeSeries: true,
        plugins: [
          Chartist.plugins.tooltip()
        ]
      });






</script>



<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.template_v1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/graphs/graphs_lists_inpatient.blade.php ENDPATH**/ ?>