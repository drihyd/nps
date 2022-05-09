@if(isset($responses_data) && $responses_data->count()>0)
<section class="pb-5">
  <div class="container">
	
	<!--
    <p class="mb-0"><b>Unit :</b> Omni Kukatpally</p>
    <p class="mb-0"><b>Questionnaire :</b> OPD</p>
    <p class="mb-0"><b>Report for :</b> January 2022</p>
    <p><b>No of Patients :</b> 75</p>
	-->

    <div class="table-responsive mt-5">
    <table  id="default-datatable" class="display table Config::get('constants.tablestriped')">
	  
        <thead class="thead-dark">
          <tr>
			<th>S.No</th>
            <th>Department</th>            
            <th>Total Feedback</th>            
            <th colspan="2">Negative feedback</th>
            <th colspan="2">Positive feedback</th>
          </tr>
          <tr>
            <th></th>
			<th></th>
			<th></th>
            <th>No of <br>Patients</th>
            <th>%</th>
            <th>No of <br>Patients</th>
            <th>%</th>
          </tr>
        </thead>
        <tbody>
			@if(isset($responses_data) && $responses_data->count()>0)
				
			@php
			$Total_Count=0;
			$Promoters=0;
			$Detractors=0;
			$Total_Percentage_Detractors=0;
			$Total_Percentage_Promoters=0;
			@endphp
				@foreach ($responses_data as $item)  
			@php			
				$Promoters=$item->Total_Promoters??0;
				$Detractors=$item->Total_Detractors??0;
				
				$Total_Count=$Promoters+$Detractors;

				
					if($Detractors>0){
						$Total_Percentage_Detractors=($Detractors/$Total_Count)*100;
					}
					else{
						$Total_Percentage_Detractors=0;
					}
					
					if($Promoters>0){
						$Total_Percentage_Promoters=($Promoters/$Total_Count)*100;	
					}	
					else{
						$Total_Percentage_Promoters=0;
					}	
					
					
					
				
			
			@endphp
			
				<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{$item->departmentname??''}}</td>
				<td>{{$Total_Count??0}}</td>
				<td>{{$Detractors??''}}</td>
				<td>{{round($Total_Percentage_Detractors)}}%</td>
				<td>{{$Promoters??''}}</td>
				<td>{{round($Total_Percentage_Promoters)}}%</td>
			
				</tr>
				@endforeach
			</tbody>
			@endif
      </table>
    </div>
  </div>
</section>
@else
@endif
