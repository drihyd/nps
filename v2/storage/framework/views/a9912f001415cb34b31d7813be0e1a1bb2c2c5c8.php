<?php
use App\Models\User;
$Users=User::select('departments.department_name as dname','users.id as uid','users.email as uemail','users.firstname as uname')
->leftJoin('departments','departments.id', '=', 'users.department')
->where("users.organization_id",Auth::user()->organization_id)
->orderBy('users.firstname', 'ASC')
->get();
?>	

<label><b>Reporting to</b><span style="color: red;">(Optional)</span></label>
<select class="form-control" name="reportingto" id="reportingto" <?php echo e($is_required??''); ?>>
<option value="">-- Select --</option>
<?php $__currentLoopData = $Users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usertype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<option value="<?php echo e($usertype->uid??''); ?>" <?php echo e(old('reportingto',$existvalue??'') == $usertype->uid ?'selected':''); ?> ><?php echo e(ucwords($usertype->uname??'')); ?>-<?php echo e(ucwords($usertype->uemail??'')); ?>-<?php echo e(ucwords($usertype->dname??'')); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select><?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/masters/users.blade.php ENDPATH**/ ?>