<div class="table-responsive">
<table  id="default-datatable" class="display table Config::get('constants.tablestriped')">
<thead class="thead-dark">
<tr>
<th>S.No.</th>
<th>Unit</th>
<th>Category</th>
<th>No.of Patients Discharged</th>            
<th>No.of Feedbacks Collected</th>
<th>Promoters</th>
<th>Passives</th>
<th>Detractors</th>
<th>Grand Total</th>
</tr>
</thead>
<tbody>


@if(isset($responses_data) && $responses_data->count()>0)
	
@php


$G_Total_Patient_Discharged=$G_Total_Feedback_Collected=$G_Total_Promoters=$G_Total_Passives=$G_Total_Detractors=$Sub_Total_Detractors=$G_Sub_Total_Detractors=0;
@endphp


@foreach ($responses_data as $item)  
@php

$orgname = DB::table('organizations')->select('company_name')->where('id',$item->organization_id)->get()->first();



$Patient_Discharged=$item->all_category_data[0]->Total_Patient_Discharged??0;
$Feedback_Collected=$item->all_category_data[0]->Total_Feedback_Collected??0;
$Promoters=$item->all_category_data[0]->Total_Promoters??0;
$Passives=$item->all_category_data[0]->Total_Passives??0;
$Detractors=$item->all_category_data[0]->Total_Detractors??0;


$G_Total_Patient_Discharged+=$Patient_Discharged;
$G_Total_Feedback_Collected+=$Feedback_Collected;
$G_Total_Promoters+=$Promoters;
$G_Total_Passives+=$Passives;
$G_Total_Detractors+=$Detractors;



$Sub_Total_Detractors=$Patient_Discharged+$Feedback_Collected+$Promoters+$Passives+$Detractors;
$G_Sub_Total_Detractors+=$Sub_Total_Detractors??0;
@endphp
<tr>
<td>{{$loop->iteration}}</td>
<td>{{$orgname->company_name??''}}</td>
<td align="center">{{$item->title??''}}</td>
<td align="center">{{$Patient_Discharged}}</td>
<td align="center"> {{$Feedback_Collected}}</td>
<td align="center">{{$Promoters}}</td>
<td align="center">{{$Passives}}</td>							  
<td align="center">{{$Detractors}}</td>
<td align="center">{{$Sub_Total_Detractors??0}}</td>
</tr>
@endforeach

<tr style="font-weight:bold;">
<td colspan=3 align="left"><strong>Grand Total</strong></td>

<td align="center">{{$G_Total_Patient_Discharged}}</td>
<td align="center">{{$G_Total_Feedback_Collected}}</td>
<td align="center">{{$G_Total_Promoters}}</td>
<td align="center">{{$G_Total_Passives}}</td>							  
<td align="center">{{$G_Total_Detractors}}</td>
<td align="center">{{$G_Sub_Total_Detractors}}</td>
</tr>

@else
	<tr><td colspan=8 align="center">No data found.</td></tr>
	

@endif

</tbody>
</table>
</div>