<?php
use App\Models\GroupLevel;
$group_level_data=GroupLevel::get();
?>
<div class="form-group mb-2">
<label><b>Level</b><span style="color: red;">*</span></label>
<select class="form-control" name="level" id="role">
  <option value="">-- All --</option>
  <?php $__currentLoopData = $group_level_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group_level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($group_level->id??''); ?>" <?php echo e($level == $group_level->id ? 'selected':''); ?>><?php echo e(ucwords($group_level->name??'')); ?> - <?php echo e(ucwords($group_level->alias??'')); ?></option>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>
<?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/common_pages/levels.blade.php ENDPATH**/ ?>