<?php
use App\Models\User;
$Users=User::select('users.id as uid','users.firstname as uname')
->where('users.role', 7)
->orderBy('users.firstname', 'ASC')
->get();
?>	

<label><b>Assign ticket<span class="text text-danger">*</span></b></label>
<select class="form-control" name="assigned" id="assigned" <?php echo e($is_required??''); ?>>
<option value="">-- Pick one -- </option>
<?php $__currentLoopData = $Users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usertype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<option value="<?php echo e($usertype->uid??''); ?>" <?php echo e(old('assigned',$assigned_user??'') == $usertype->uid ?'selected':''); ?> ><?php echo e(ucwords($usertype->uname??'')); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/masters/support_users.blade.php ENDPATH**/ ?>