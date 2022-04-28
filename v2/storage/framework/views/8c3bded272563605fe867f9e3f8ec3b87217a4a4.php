<?php
use App\Models\Departments;
$Departments=Departments::where("organization_id",Auth::user()->organization_id)->orderBy('department_name', 'ASC')->get();
?>	

<label><b>Team</b><span style="color: red;">(Optional)</span></label>
<select class="form-control" name="department" id="department" <?php echo e($is_required??''); ?>>
<option value="">-- Select --</option>
<?php $__currentLoopData = $Departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usertype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<option value="<?php echo e($usertype->id??''); ?>" <?php echo e(old('department',$department??'') == $usertype->id ? 'selected':''); ?>><?php echo e(ucwords($usertype->department_name??'')); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select><?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/masters/departments.blade.php ENDPATH**/ ?>