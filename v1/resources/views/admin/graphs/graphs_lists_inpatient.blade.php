@extends('admin.template_v1')
@section('title', 'Graphs In-Patient')
@section('content')


<div class="row">

<!--
    <div class="col-lg-6">
          <div class="card m-b-30">
              <div class="card-header">
                  <h5 class="card-title">The Net Promoter Score (NPS)</h5>
              </div>
              <div class="card-body">
                  <canvas id="chartjs-stacked-bar-chart" class="chartjs-chart"></canvas>
              </div>
          </div>
      </div>
	  -->
	  
	  
	  
	      <div class="col-lg-8">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">The Net Promoter Score (NPS)</h5>
            </div>
            <div class="card-body">
                <div id="c3-stacked-bar-nps" style="height:400px;"></div>
            </div>
        </div>
    </div>
	  
	  
    <div class="col-lg-4">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Known About OMNI Hospitals</h5>
            </div>
            <div class="card-body">
                
                <div id="chartist-stacked-bar" class="ct-chart ct-golden-section chartist-stacked-bar"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Procedure of Building</h5>
            </div>
            <div class="card-body">
                
                <div id="chartist-stacked-bar-1" class="ct-chart ct-golden-section chartist-stacked-bar"></div>
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
            ]
        },
  
		
		axis: {
    x: {
      type: 'category',
      categories: [@php echo $monthnames @endphp]
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
                        }]
                    }
                }
  
			
});





	  
	  
	  
/* -- Chartjs - Stacked Bar Chart -- */
/* -----  Chartjs - Global Style  ----- */

	
	
       

    /* -----  Chartistjs - Stacked Bar Chart -- */
      new Chartist.Bar('#chartist-stacked-bar', {
        labels: ['Q1', 'Q2', 'Q3', 'Q4'],
        series: [
          [50, 12, 14, 13],
          [20, 40, 40, 30],
          [10, 20, 40, 40]
        ]
      }, {
        stackBars: true,
		
		        xaxis: {
            type: 'datetime',
            categories: ['01/01/2011 GMT', '01/02/2011 GMT', '01/03/2011 GMT', '01/04/2011 GMT', '01/05/2011 GMT', '01/06/2011 GMT', '01/07/2011 GMT', '01/08/2011 GMT', '01/09/2011 GMT', '01/10/2011 GMT'],
            axisBorder: {
                show: true, 
                color: 'rgba(0,0,0,0.05)'
            },
            axisTicks: {
                show: true, 
                color: 'rgba(0,0,0,0.05)'
            }
        },
        axisY: {
          labelInterpolationFnc: function(value) {
            return (value / 1) + '%';
          }
        },
        plugins: [
          Chartist.plugins.tooltip()
        ]
      }).on('draw', function(data) {
        if(data.type === 'bar') {
          data.element.attr({
            style: 'stroke-width: 30px'
          });
        }
      });









      /* -----  Chartistjs - Stacked Bar Chart -- */
      new Chartist.Bar('#chartist-stacked-bar-1', {
        labels: ['Q1', 'Q2', 'Q3', 'Q4'],
        series: [
          [50, 12, 14, 13],
          [20, 40, 40, 30],
          [10, 20, 40, 40]
        ]
      }, {
        stackBars: true,
        axisY: {
          labelInterpolationFnc: function(value) {
            return (value / 1) + '%';
          }
        },
        plugins: [
          Chartist.plugins.tooltip()
        ]
      }).on('draw', function(data) {
        if(data.type === 'bar') {
          data.element.attr({
            style: 'stroke-width: 30px'
          });
        }
      });

     



});

</script>



@endpush

