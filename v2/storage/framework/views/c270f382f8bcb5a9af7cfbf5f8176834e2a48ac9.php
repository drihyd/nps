<?php $__env->startComponent('mail::message'); ?>
<h1>Registration confirmation</h1>
Dear <?php echo e($content['name']??'Hello'); ?><br><br>
Congratulations on registering with us. Now you can get all the inside information on products! Please login to enjoy shopping with us.<br>
Regards,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/emails/RegistrationSendMail.blade.php ENDPATH**/ ?>