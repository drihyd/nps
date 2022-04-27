<?php
use App\Models\Departments;
$teams=Departments::where('organization_id',Auth::user()->organization_id)->orderBy('department_name','asc')->get();
?>
<div class="form-group mb-2">
<label for="Teams" class="sr-only">Teams</label>
<select  class="form-control" name="team" id="team">
<option value="">-- All Teams --</option>
<?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($department->department_name); ?>" <?php echo e($pickteam == $department->department_name ? 'selected':''); ?>><?php echo e($department->department_name??''); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>
<?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/admin/common_pages/teams.blade.php ENDPATH**/ ?>