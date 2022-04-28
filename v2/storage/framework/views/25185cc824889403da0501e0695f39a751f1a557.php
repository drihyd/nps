<?php $__env->startComponent('mail::message'); ?>
<h2>NPS Score/Rating: <?php echo e(Str::title($content['nps_score']??'')); ?> </h2>
Ticket Number: <?php echo e(Str::title($content['ticket_number']??'')); ?><br>
Name: <?php echo e(Str::title($content['person_data']->firstname??'')); ?><br> 
Mobile: <?php echo e(Str::title($content['person_data']->mobile??'')); ?><br>
Email: <?php echo e(Str::title($content['person_data']->email??'')); ?><br>
Feedback Date: <?php echo e(date('F j, Y', strtotime($content['person_data']->created_at??''))); ?><br><br>
<h3>Areas of Improvement.</h3>
<table colspan=2 cellpadding=2 style="border-collapse: collapse;width: 100%;" border="border-collapse" >
<tbody>

<tr>
<td><b><?php echo e(Str::title($content['Dep_name']??'')); ?></b></td>
<td><?php echo e(Str::title($content['Dep_activities']??'')); ?></td>
<td><?php echo e(Str::title($content['Dep_note']??'')); ?></td>
</tr>
				
</tbody>
</table><br>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/emails/hod_department.blade.php ENDPATH**/ ?>