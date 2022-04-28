<?php $__env->startComponent('mail::message'); ?>
<h1>Login Credentials</h1>
Dear <?php echo e($content['name']??'Hello'); ?><br><br>
#Login Username: <?php echo e($content['email']); ?><br>
#Login Password: <?php echo e($content['password']); ?><br>
<br><br>
<?php
$linkurl = URL::to('/');
?>
Select and copy the following URL to login your account.
<?php echo e($linkurl); ?>

<br><br>
After logged in your account go to reset password link for update your own password.
<br><br>
Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/emails/ResetpasswordMail.blade.php ENDPATH**/ ?>