@extends('admin.template_v1')
@section('title', 'Open and closed actions')
@section('content')




<div class="row">
    <div class="col-lg-12 col-xl-12">
	
	
	

	
	<div class="card m-b-30">
<div class="card-header">                                
<div class="row align-items-center">
<div class="col-12">

<h5 class="card-title mb-2">@yield('title')</h5>

<form class="table-filter mb-4 form-inline graph_form" action="{{route('filter-grpahs-opened-closed-actions')}}" method="post" >
@csrf
@include('admin.common_pages.dates_input')
@include('admin.common_pages.action_button')
&nbsp;

<div class="form-group mb-2">
@if(auth()->user())
@if(auth()->user()->role==2)
<a href="{{url(Config::get('constants.admin').'/graphs')}}">Reset</a>
@else
<a href="{{url(Config::get('constants.user').'/graphs')}}">Reset</a>
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

	<div class="row align-items-center">
	
<div class="col-12">
<div class="card m-b-30">
<div class="card-body py-0 pl-0">
<div id="open-closed-actions-chart"></div>
</div>
</div>
</div>

@if($department_statistics)

<div class="col-lg-12 col-xl-12">


                        <div class="card m-b-30 dash-widget">
                            <div class="card-header">                                
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h5 class="card-title mb-0">Stastics</h5>
                                    </div>
                               
                                </div>
                            </div>
                            <div class="card-body py-0">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
									
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">S.No.</th>
                                                <th scope="col">Team/Department</th>
                                                <th scope="col">Alerts that came in</th>
                                                <th scope="col">Alerts that are closed</th>
                                                <th scope="col">Alerts that are assigned bu still open</th>
                                           
                                            </tr>
                                        </thead>
                                        <tbody>
										
										@foreach($department_statistics as $key=>$item)
										
@php
$teamname = DB::table('question_options')->select('option_value')->where('id',$item->department_name_id)->get()->first();
@endphp
@if ($loop->iteration % 2 == 0)
<tr class="table-danger">
@else 
<tr class="table-primary">
@endif
										
												<td>{{$loop->iteration}}</td>
												
                                                <td align="left">{{$teamname->option_value??''}}</td>
                                                <td align="center">{{$item->alerts_came_in??''}}</td>
                                                <td align="center">{{$item->alerts_closed??''}}</td>
                                                <td align="center">{{$item->alerts_still_opened??''}}</td>
                                        
                                            </tr>
                                     
											
                                           @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>




@else

@endif













		 
		 
		 
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

