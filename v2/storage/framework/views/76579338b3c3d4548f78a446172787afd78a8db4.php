<?php
use App\Models\User;
$Users=User::select('departments.department_name as dname','users.id as uid','users.firstname as uname')
->leftJoin('departments','departments.id', '=', 'users.department')
->whereNotIn('users.id',[auth()->user()->id??0])             
->where('users.role', 3)
->orderBy('users.firstname', 'ASC')
->get();
?>

<label><b>HOD <span class="text text-danger">*</span></b></label>
<select class="form-control" name="hod_user" id="hod_user" <?php echo e($is_required??''); ?>>
<option value="">-- Pick one --</option>
<?php $__currentLoopData = $Users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usertype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<option value="<?php echo e($usertype->uid??''); ?>" <?php echo e(old('hod_user',$existvalue??'') == $usertype->uid ?'selected':''); ?> ><?php echo e(ucwords($usertype->uname??'')); ?>-<?php echo e(ucwords($usertype->dname??'')); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/masters/hod_users.blade.php ENDPATH**/ ?>