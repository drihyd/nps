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
		/*
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
	/*
    /* -- Chartjs - Doughnut Chart -- */
        var doughnutChartID = document.getElementById("chartjs-doughnut-chart").getContext('2d');
        var doughnutChart = new Chart(doughnutChartID, {
            type: 'doughnut',
            ajax: "{{ route('dashboardcount.index') }}",

            data: {
                // alert(data);
                datasets: [{
                    data: [{{$final_score->Promoters??1}},{{$final_score->Neutral??1}},{{$final_score->Detractors??1}}],
                    borderColor: 'transparent',
                    backgroundColor: [
					                    "{{Config::get('constants.Promoters')}}",
					                    "{{Config::get('constants.Passives')}}",
					                    "{{Config::get('constants.Detractors')}}",
				                    ],
                    label: 'Dataset 1'
                }],
                labels: ["{{Config::get('constants.Promoters-label')}} ",
                		 "{{Config::get('constants.Passives-label')}} ",
                		 "{{Config::get('constants.Detractors-label')}}",
                		 ]
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
	
	
	
	
	$(document).ready(function() {
	
	$('.tikcet_remark_status_update,.process_level_closure').bind('copy paste cut',function(e){
		
		
		e.preventDefault();
		
		alert('cut.copy & paste options are disabled !!');
		
	});
	
	
	});
	
	
	
	
	
	
	
  </script>
  
  
  <script type="text/javascript">
  
  
  
    function EnableDisableTextBox(val) {
		
		

		
		
		if (val == "process_level_closure") {
			
				$(".hide_process_level_option").show();
				$('#process_level_closure').attr('required', true); 
				$('#category_process').attr('required', true); 
				
				
				$(".hide_assigned_option").hide();
				$(".hide_transferred_option").hide();	
				  
            }			
			
			
			else if (val == "assigned") {
			
				$(".hide_assigned_option").show();				
				$('#assigned').attr('required', true);

				$('#process_level_closure').attr('required', false); 
				$('#category_process').attr('required', false);	
				$('#hod_user').attr('required', false);
				
				$(".hide_process_level_option").hide();				
				$(".hide_transferred_option").hide();				
			
				  
            }
			
			else if (val == "transferred") {
			
				$(".hide_transferred_option").show();				
				$('#hod_user').attr('required', true);
				
				$('#process_level_closure').attr('required', false); 
				$('#category_process').attr('required', false);
				$('#assigned').attr('required', false);	
				
				$(".hide_process_level_option").hide();	
				$(".hide_assigned_option").hide();
				
			
				  
            }



			else {
				
				$('#process_level_closure').attr('required', false); 
				$('#category_process').attr('required', false);
				$('#assigned').attr('required', false); 
				$('#hod_user').attr('required', false);
				
				
				$(".hide_process_level_option").hide();
				$(".hide_assigned_option").hide();
				$(".hide_transferred_option").hide();
				 
            }
		
		
    }
	
	
var maxLength = 250;
$('textarea#ticket_remarks').keyup(function() {
var textlen = maxLength - $(this).val().length;
$('#rchars').text(textlen);
});

$('textarea#process_level_closure').keyup(function() {
var textlen = maxLength - $(this).val().length;
$('#rchars_option').text(textlen);
});
	
</script>
  
  
  
  

  
