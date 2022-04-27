<div class="table-responsive">
<table  id="default-datatable" class="display table Config::get('constants.tablestriped')">
<thead class="thead-dark">
<tr>
<th>S.No.</th>
<th>Unit Name</th>
<th>No. of Patients Discharged</th>            
<th>No. of Feedbacks Collected</th>
<th>Promoters</th>
<th>Passives</th>
<th>Detractors</th>
<th>Grand Total</th>
</tr>
</thead>
<tbody>


<?php if(isset($responses_data) && $responses_data->count()>0): ?>
	
<?php


$G_Total_Patient_Discharged=$G_Total_Feedback_Collected=$G_Total_Promoters=$G_Total_Passives=$G_Total_Detractors=$Sub_Total_Detractors=$G_Sub_Total_Detractors=0;
?>


<?php $__currentLoopData = $responses_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
<?php

$orgname = DB::table('organizations')->select('company_name')->where('id',$item->organization_id)->get()->first();

$G_Total_Patient_Discharged+=$item->Total_Patient_Discharged;
$G_Total_Feedback_Collected+=$item->Total_Feedback_Collected;
$G_Total_Promoters+=$item->Total_Promoters;
$G_Total_Passives+=$item->Total_Passives;
$G_Total_Detractors+=$item->Total_Detractors;
$Sub_Total_Detractors=$item->Total_Patient_Discharged+$item->Total_Feedback_Collected+$item->Total_Promoters+$item->Total_Passives+$item->Total_Detractors;
$G_Sub_Total_Detractors+=$Sub_Total_Detractors;
?>
<tr>
<td><?php echo e($loop->iteration); ?></td>
<td><?php echo e($orgname->company_name??''); ?></td>
<td align="center"><?php echo e($item->Total_Patient_Discharged); ?></td>
<td align="center"> <?php echo e($item->Total_Feedback_Collected); ?></td>
<td align="center"><?php echo e($item->Total_Promoters); ?></td>
<td align="center"><?php echo e($item->Total_Passives); ?></td>							  
<td align="center"><?php echo e($item->Total_Detractors); ?></td>
<td align="center"><?php echo e($Sub_Total_Detractors); ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<tr style="font-weight:bold;">
<td colspan=2 align="left"><strong>Grand Total</strong></td>

<td align="center"><?php echo e($G_Total_Patient_Discharged); ?></td>
<td align="center"><?php echo e($G_Total_Feedback_Collected); ?></td>
<td align="center"><?php echo e($G_Total_Promoters); ?></td>
<td align="center"><?php echo e($G_Total_Passives); ?></td>							  
<td align="center"><?php echo e($G_Total_Detractors); ?></td>
<td align="center"><?php echo e($G_Sub_Total_Detractors); ?></td>
</tr>

<?php else: ?>
	<tr><td colspan=8 align="center">No data found.</td></tr>
	

<?php endif; ?>

</tbody>
</table>
</div><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/reports/table_performitors.blade.php ENDPATH**/ ?>