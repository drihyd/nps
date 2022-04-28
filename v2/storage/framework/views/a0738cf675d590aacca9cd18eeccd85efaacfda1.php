<div class="col-lg-6">
<div class="card m-b-30">
<div class="card-header">
<h5 class="card-title mb-2">NPS Score</h5>
<h3 class="my-0 "><?php echo e(round($final_score->NPS??0,2)); ?></h3>


</div>
<?php if($final_score->Promoters>=0 || $final_score->Neutral>=0 || $final_score->Detractors>=0 ): ?>

<div class="card-body" >
<canvas id="chartjs-doughnut-chart" class="chartjs-chart"></canvas>
</div>
<?php else: ?>
<div class="col-md-4 col-lg-4 mb-5">

<div class="widgetbar">
<?php if(auth()->user()): ?>
<?php if(auth()->user()->role==2 || auth()->user()->role==1): ?>
<a href="<?php echo e(URL(Config::get('constants.admin').'/survey/start/'.Crypt::encryptString(1))); ?>">
<?php else: ?>
<a href="<?php echo e(URL(Config::get('constants.user').'/survey/start/'.Crypt::encryptString(1))); ?>">
<?php endif; ?>
<?php else: ?>
<a href="#">
<?php endif; ?>
</div> 




</div> 
<?php endif; ?>
</div>
</div>

<?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/dashboard/graph_nps_count.blade.php ENDPATH**/ ?>