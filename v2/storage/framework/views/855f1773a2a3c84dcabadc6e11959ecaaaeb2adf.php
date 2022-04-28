<?php $__env->startComponent('mail::message'); ?>
<h2>NPS Score/Rating: <?php echo e(Str::title($content['data'][0]->rating??'')); ?> </h2>

Ticket Number: <?php echo e(Str::title($content['ticket_number']??'')); ?><br>
Name: <?php echo e(Str::title($content['person_data']->firstname??'')); ?><br> 
Mobile: <?php echo e(Str::title($content['person_data']->mobile??'')); ?><br>
Email: <?php echo e(Str::title($content['person_data']->email??'')); ?><br>

Feedback Date: <?php echo e(date('F j, Y', strtotime($content['person_data']->created_at??''))); ?><br><br>
<h3>Areas of Improvement.</h3>
<table colspan=2 cellpadding=2 style="border-collapse: collapse;width: 100%;" border="border-collapse" >
<tbody>
<?php $__currentLoopData = $content['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person_response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($person_response->answeredby_person != ''): ?>
<tr>
<td><b><?php echo e($person_response->option_value??''); ?></b></td>
<td><?php echo e(Str::title($person_response->department_activities??'')); ?></td>
<td><?php echo e(Str::title($person_response->answeredby_person??'')); ?></td>
</tr>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>					
</tbody>
</table><br>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/emails/ticket-opened.blade.php ENDPATH**/ ?>