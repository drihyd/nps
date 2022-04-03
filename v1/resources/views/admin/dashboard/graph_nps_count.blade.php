<div class="col-lg-6">
<div class="card m-b-30">
<div class="card-header">
<h5 class="card-title mb-2">NPS Score</h5>
<h3 class="my-0 ">{{round($final_score->NPS??0,2)}}</h3>


</div>
@if($final_score->Promoters>0 || $final_score->Neutral>0 || $final_score->Detractors>0 )

<div class="card-body" >
<canvas id="chartjs-doughnut-chart" class="chartjs-chart"></canvas>
</div>
@else
<div class="col-md-4 col-lg-4 mb-5">

<div class="widgetbar">
@if(auth()->user())
@if(auth()->user()->role==2 || auth()->user()->role==1)
<a href="{{URL(Config::get('constants.admin').'/survey/start/'.Crypt::encryptString(1))}}">
@else
<a href="{{URL(Config::get('constants.user').'/survey/start/'.Crypt::encryptString(1))}}">
@endif
@else
<a href="#">
@endif
</div> 




</div> 
@endif
</div>
</div>

