@extends('admin.template_v1')
@section('title', 'Open and closed actions')
@section('content')




<div class="row">
    <div class="col-lg-12 col-xl-12">
        <div class="card m-b-30">
            <div class="card-header">                                
                <div class="row align-items-center">
                    <div class="col-9">
                        <h5 class="card-title mb-0">@yield('title')</h5>
                    </div>
                 
                </div>
            </div>
            <div class="card-body py-0 pl-0">
                <div id="open-closed-actions-chart"></div>
            </div>
        </div>
    </div>
</div>
@endsection



@push('scripts')



<script>
  
  
 

$(document).ready(function() {
 
 console.log("@php echo $monthnames @endphp");
  
	  
      /* -----  Chartistjs - Stacked Bar Chart -- */
      var options = {
		  
		  
          series: [{
          name: 'Opened',
          data: [ 
		  {{$action_count??""}} ]
        }, {
          name: 'Closed',
          data: [ {{$closed_action_count??""}} ]
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
				
          categories:   [@php echo $monthnames @endphp]
		  
		  
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

@endpush

