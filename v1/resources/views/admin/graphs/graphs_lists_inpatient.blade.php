@extends('admin.template_v1')
@section('title', 'Graphs In-Patient')
@section('content')




<div class="row">

<!-- Start col -->


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


	      <div class="col-lg-6">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Department Score</h5>
            </div>
            <div class="card-body">
                <div id="c3-stacked-bar-department-nps" style="height:400px;"></div>
            </div>
        </div>
    </div>
	  
	  
	  	      <div class="col-lg-6">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Department Activities Score</h5>
            </div>
            <div class="card-body">
                <div id="c3-stacked-bar-department-activities-nps" style="height:400px;"></div>
            </div>
        </div>
    </div>
	  
	  
	  

	  

</div>
@endsection



@push('scripts')

<script type="text/javascript">
  $(document).ready(function() {

 /* -- NPS Score Bar Chart -- */ 	 



    var stackedBarChart = c3.generate({
		
		
	
		
        bindto: '#c3-stacked-bar-nps',
        color: { pattern: ["{{Config::get('constants.Detractors')}}","{{Config::get('constants.Passives')}}","{{Config::get('constants.Promoters')}}","{{Config::get('constants.NPS')}}"] },
        data: {
            columns: [
                ["{{Config::get('constants.Detractors-label')}}", @php echo $detractors_count??'' @endphp],
                ["{{Config::get('constants.Passives-label')}}", @php echo $passives_count??'' @endphp],
                ["{{Config::get('constants.Promoters-label')}}", @php echo $promotors_count??'' @endphp],
                ["{{Config::get('constants.Nps-label')}}", @php echo $nps_count??'' @endphp],         
            ],
            type: 'bar',
            groups: [
                ["{{Config::get('constants.Detractors-label')}}","{{Config::get('constants.Passives-label')}}","{{Config::get('constants.Promoters-label')}}"]
            ],
			
			
        },
		
		

  
		
		axis: {
    x: {
      type: 'category',
      categories: [@php echo $monthnames @endphp]
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
        color: { pattern: ["{{Config::get('constants.Detractors')}}","{{Config::get('constants.Passives')}}","{{Config::get('constants.Promoters')}}"] },
        data: {
			
			
            columns: [
                ["{{Config::get('constants.Detractors-label')}}", @php echo $_dep_scors[1]??'' @endphp],
                ["{{Config::get('constants.Passives-label')}}", @php echo $_dep_scors[2]??'' @endphp],
                ["{{Config::get('constants.Promoters-label')}}", @php echo $_dep_scors[3]??'' @endphp],
			
				
            ],
            type: 'bar',
           groups: [
                ["{{Config::get('constants.Detractors-label')}}","{{Config::get('constants.Passives-label')}}","{{Config::get('constants.Promoters-label')}}"]
            ]
			
			
			
        },
  
		
		axis: {
    x: {
      type: 'category',
      categories: [@php echo $_dep_scors[0]??'' @endphp]
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
        color: { pattern: ["{{Config::get('constants.Detractors')}}","{{Config::get('constants.Passives')}}","{{Config::get('constants.Promoters')}}"] },
        data: {
			
			
            columns: [
                ["{{Config::get('constants.Detractors-label')}}", @php echo $_dep_act_scors[1]??'' @endphp],
                ["{{Config::get('constants.Passives-label')}}", @php echo $_dep_act_scors[2]??'' @endphp],
                ["{{Config::get('constants.Promoters-label')}}", @php echo $_dep_act_scors[3]??'' @endphp],
			
				
            ],
            type: 'bar',
           groups: [
                ["{{Config::get('constants.Detractors-label')}}","{{Config::get('constants.Passives-label')}}","{{Config::get('constants.Promoters-label')}}"]
            ]
			
			
			
        },
  
		
		axis: {
    x: {
      type: 'category',
      categories: [@php echo $_dep_act_scors[0]??'' @endphp]
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


</script>



@endpush

