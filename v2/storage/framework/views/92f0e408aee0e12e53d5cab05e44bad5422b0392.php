<script type="text/javascript">      
$(document).ready(function () {      
$(".gst").change(function () {
	
	

	
                var inputvalues = $(this).val(); 				
                var gstinformat = new RegExp('^([0-9]){2}([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}([0-9]){1}([a-zA-Z]){1}([0-9]){1}?$');    
                if (gstinformat.test(inputvalues)) {    
                    return true;    
                } else {    
                    alert('Please Enter Valid GSTIN Number');    
                    $(".gst").val('');    
                    $(".gst").focus();    
                }    
            });          
 });          
  </script> 
  <script type="text/javascript">
      $(document).ready(function() {
		  
		  
		  

		  
		  
        /* -----  Chartjs - Global Style  ----- */
    Chart.defaults.global.defaultFontFamily = 'Muli';
    Chart.defaults.global.defaultFontColor = '#8A98AC';
    Chart.defaults.global.defaultFontSize = 13;
    Chart.defaults.global.defaultFontStyle = 'normal';
    Chart.defaults.global.maintainAspectRatio = 0;
    Chart.defaults.global.lineWidth = 2;
    Chart.defaults.global.tooltips.backgroundColor = '#282828';
    Chart.defaults.global.tooltips.titleFontSize = 14;
    Chart.defaults.global.tooltips.titleFontStyle = 'normal';
    Chart.defaults.global.tooltips.bodyFontSize = 12;
    Chart.defaults.global.tooltips.bodyFontStyle = 'normal';
    Chart.defaults.global.tooltips.bodyFontColor = '#8A98AC';
    Chart.defaults.global.tooltips.xPadding = 10;
    Chart.defaults.global.tooltips.yPadding = 10;
    Chart.defaults.global.tooltips.titleMarginBottom = 10;
    Chart.defaults.global.tooltips.bodySpacing = 8;
    Chart.defaults.global.tooltips.cornerRadius = 5;    
    Chart.defaults.global.legend.labels.boxWidth = 15;
    Chart.defaults.global.legend.labels.fontSize = 15;
    Chart.defaults.global.legend.labels.padding = 16;
    /* -- Chartjs - Doughnut Chart -- */
        var doughnutChartID = document.getElementById("chartjs-doughnut-chart").getContext('2d');
        var doughnutChart = new Chart(doughnutChartID, {
            type: 'doughnut',
            ajax: "<?php echo e(route('dashboardcount.index')); ?>",

            data: {
                // alert(data);
                datasets: [{
                    data: [<?php echo e($final_score->Promoters??1); ?>,<?php echo e($final_score->Neutral??1); ?>,<?php echo e($final_score->Detractors??1); ?>],
                    borderColor: 'transparent',
                    backgroundColor: ["#228B22","#ffa800","#ff654d"],
                    label: 'Dataset 1'
                }],
                labels: ['Promoters : '+<?php echo e($final_score->Promoters??0); ?>,'Passvies: '+<?php echo e($final_score->Neutral??0); ?>,'Detractors :'+<?php echo e($final_score->Detractors??0); ?>]
            },
            options: {
                responsive: true,  
                cutoutPercentage: 75,              
                legend: {
                    position: 'top'
                },
           
                animation: {
                    animateScale: true,
                    animateRotate: true
                },
				

  
  
  

				
				
				
            }
        });
    });
  </script>
  

  
  <script>
  
      /* -- Chartistjs - Gauge Chart Using Fill Rather Than Stroke -- */
	  
	  /*
      new Chartist.Pie('#chartist-gauge-fill-rather-chart', {
        series: [<?php echo e($final_score->Promoters??0); ?>,<?php echo e($final_score->Neutral??0); ?>,<?php echo e($final_score->Detractors??0); ?>]
      }, {
        donut: true,
        donutWidth: 40,
        donutSolid: true,
        startAngle: 270,
        total: <?php echo e($final_score->total_feedbacks??0); ?>,
        showLabel: true
      });
  
  */
  </script><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/common_pages/functions_js.blade.php ENDPATH**/ ?>