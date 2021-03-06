@extends('admin.template_v1')
@section('title', $pageTitle)
@section('content')
<div class="row">
<!-- Start col -->
@if(isset(auth()->user()->role) && auth()->user()->role!=3)

<div class="col-lg-12">
<div class="card m-b-30">
<div class="card-header">                                
<div class="row align-items-center">
<div class="col-12">

<h5 class="card-title mb-2">@yield('title')</h5>

<form class="table-filter mb-4 form-inline graph_form" action="{{route('filter.nps.graph')}}" method="post" >
@csrf
@include('admin.common_pages.dates_input')
@include('admin.common_pages.action_button')
&nbsp;

<div class="form-group mb-2">
@if(auth()->user())
@if(auth()->user()->role==2)
<a href="{{url(Config::get('constants.admin').'/nps-graph')}}" class="btn btn-warning btn-sm ">Reset</a>
@else
<a href="{{url(Config::get('constants.user').'/nps-graph')}}" class="btn btn-warning btn-sm">Reset</a>
@endif
@else
<a href="#">
@endif
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
<h5 class="card-title">@yield('title')</h5>
</div>
<div class="card-body">
<div id="c3-stacked-bar-nps" style="height:400px;" class="chartjs-chart"></div>
</div>
</div>
</div>

@endif  

</div>
@endsection



@push('scripts')

<script type="text/javascript">
  $(document).ready(function() {

 /* -- NPS Score Bar Chart -- */ 	 
    var stackedBarChart = c3.generate({
        bindto: '#c3-stacked-bar-nps',
        color: { pattern: ["{{Config::get('constants.NPS')}}"] },
        data: {
            columns: [
				["{{Config::get('constants.Nps-label')}}", @php echo $nps_count??'' @endphp],
            ],
            type: 'bar',
         },
		axis: {
    x: {
      type: 'category',
      categories: [@php echo $monthnames @endphp]
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



@endpush

