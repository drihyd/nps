<?php
use App\Models\Departments;
$teams=Departments::orderBy('department_name','asc')->get();
?>


<?php if(isset(auth()->user()->role) && auth()->user()->role==3): ?>
<div class="form-group mb-2">
<label for="Teams" class="sr-only">Teams</label>
<select  class="form-control form-control-sm" name="team" id="team">
<option value="">--Teams--</option>
<?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(auth()->user()->department==$department->id): ?>
<option selected value="<?php echo e($department->department_name); ?>" <?php echo e($pickteam == $department->department_name ? 'selected':''); ?>><?php echo e($department->department_name??''); ?></option>
<?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>

	
<?php else: ?>

<div class="form-group mb-2">
<label for="Teams" class="sr-only">Teams</label>
<select  class="form-control form-control-sm" name="team" id="team">
<option value="">--Teams--</option>
<?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($department->department_name); ?>" <?php echo e($pickteam == $department->department_name ? 'selected':''); ?>><?php echo e($department->department_name??''); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>


<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/common_pages/teams.blade.php ENDPATH**/ ?>