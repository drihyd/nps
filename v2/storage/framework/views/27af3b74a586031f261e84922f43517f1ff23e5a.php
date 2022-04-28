<?php $__env->startComponent('mail::message'); ?>
<h1>Feedback Survey</h1>
Dear <?php echo e($content['name']??'Hello'); ?><br><br>
Ticket/Reference Number: #<?php echo e(Str::title($content['ticket_number']??'')); ?><br>
#Please use following link for start your feedback survey<br>
<br><br>
<?php
$linkurl = URL::to('offlinesurvey/'.$content['surveyid'].'/'.$content['loggedid'].'/'.$content['personid']);
?>
Select and copy the following URL to give your feedback.
<?php echo e($linkurl); ?>


<br><br>
Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/emails/FeedbackSurvey.blade.php ENDPATH**/ ?>