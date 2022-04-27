<?php
$user_type_data=DB::table('user_types')->whereNotIn('user_types.id',[1,2])->get();
?>
<div class="form-group mb-2">
<label><b>Designation</b><span style="color: red;">*</span></label>
<select class="form-control" name="role" id="role">
  <option value="">-- All --</option>
  <?php $__currentLoopData = $user_type_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usertype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($usertype->id??''); ?>" <?php echo e($role == $usertype->id ? 'selected':''); ?>><?php echo e(ucwords($usertype->name??'')); ?></option>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>
<?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/admin/common_pages/roles.blade.php ENDPATH**/ ?>