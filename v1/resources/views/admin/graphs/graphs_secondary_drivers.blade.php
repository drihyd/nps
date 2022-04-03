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

<form class="table-filter mb-4 form-inline graph_form" action="{{route('filter.secondary.drivers')}}" method="post" >
@csrf
@include('admin.common_pages.dates_input')
@include('admin.common_pages.action_button')
&nbsp;

<div class="form-group mb-2">
@if(auth()->user())
@if(auth()->user()->role==2)
<a href="{{url(Config::get('constants.admin').'/graph-secondary-drivers')}}" class="btn btn-warning btn-sm ">Reset</a>
@else
<a href="{{url(Config::get('constants.user').'/graph-secondary-drivers')}}" class="btn btn-warning btn-sm">Reset</a>
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
<div id="c3-stacked-bar-department-activities-nps" style="height:400px;"></div>
</div>
</div>
</div>
@endif  

</div>
@endsection



@push('scripts')

<script type="text/javascript">
  $(document).ready(function() {

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
                }
  
			
});

});



</script>



@endpush

