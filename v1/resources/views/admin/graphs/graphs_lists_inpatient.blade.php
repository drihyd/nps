@extends('admin.template_v1')
@section('title', 'Graphs In-Patient')
@section('content')




<div class="row">
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
    <div class="col-lg-6">
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
/* -- Chartjs - Stacked Bar Chart -- */
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
        var stackedBarChartID = document.getElementById("chartjs-stacked-bar-chart").getContext('2d');
        var stackedBarChart = new Chart(stackedBarChartID, {
            type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [{
                        label: 'Series A',
                        backgroundColor: ["#0080ff", "#0080ff", "#0080ff", "#0080ff", "#0080ff", "#0080ff", "#0080ff"],
                        data: [70, 66, 50, 69, 9, 36, -26]
                    }, {
                        label: 'Series B',
                        backgroundColor: ["#18d26b", "#18d26b", "#18d26b", "#18d26b", "#18d26b", "#18d26b", "#18d26b"],
                        data: [19, -17, 67, -21, -26, 32, -29]
                    }, {
                        label: 'Series C',
                        backgroundColor: ["#d4d8de", "#d4d8de", "#d4d8de", "#d4d8de", "#d4d8de", "#d4d8de", "#d4d8de"],
                        data: [92, -48, 80, 21, -90, -12, 43]
                    }]
                },
                options: {
                    title: {
                        display: false,
                        text: 'Chart.js Bar Chart - Stacked'
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
                                color: 'rgba(0,0,0,0.05)',
                                lineWidth: 1,
                                borderDash: [0]
                            }
                        }],
                        yAxes: [{
                            stacked: true,
                            gridLines: {
                                color: 'rgba(0,0,0,0.05)',
                                lineWidth: 1,
                                borderDash: [0]
                            }
                        }]
                    }
                }
        });


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

