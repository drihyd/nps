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
                    <div class="col-3">
                        <div class="dropdown">
                            <button class="btn btn-link p-0 font-18 float-right" type="button" id="widgetPatientTypes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetPatientTypes">
                                <a class="dropdown-item font-13" href="#">Refresh</a>
                                <a class="dropdown-item font-13" href="#">Export</a>
                            </div>
                        </div>
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
 
  
	  
      /* -----  Chartistjs - Stacked Bar Chart -- */
      var options = {
          series: [{
          name: 'Opened',
          data: [44, 55, 41, 67, 22, 43]
        }, {
          name: 'Closed',
          data: [13, 23, 20, 8, 13, 27]
        }],
          chart: {
          type: 'bar',
          height: 300,
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
              offsetX: -10,
              offsetY: 0
            }
          }
        }],
        plotOptions: {
          bar: {
            horizontal: false,
          },
        },
        xaxis: {
          type: 'datetime',
          categories: ['01/01/2011 GMT', '01/02/2011 GMT', '01/03/2011 GMT', '01/04/2011 GMT',
            '01/05/2011 GMT', '01/06/2011 GMT'
          ],
        },
        legend: {
          position: 'right',
          offsetY: 0,
          show: false
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

