<?php
use App\Models\Departments;
$Departments=Departments::where("organization_id",Auth::user()->organization_id)->orderBy('department_name', 'ASC')->get();
?>
<div class="form-group mb-2">
<label><b>Teams</b><span style="color: red;">*</span></label>
<select class="form-control" name="team" id="team">
<option value="">-- All --</option>
<?php $__currentLoopData = $Departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usertype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<option value="<?php echo e($usertype->id??''); ?>" <?php echo e($team == $usertype->id ? 'selected':''); ?>><?php echo e(ucwords($usertype->department_name??'')); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>
<?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/admin/common_pages/departments.blade.php ENDPATH**/ ?>