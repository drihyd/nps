<?php
use App\Models\Organizations;
$Organizations=Organizations::select('id','company_name','short_name')->orderBy('short_name', 'ASC')->get();
?>	
<?php if($is_required): ?>
<label><b>Organizations </b><span class="text text-danger">*</span></label>
<?php else: ?>
<label><b>Organizations</b></label>	
<?php endif; ?>
<select class="form-control" name="company_name" id="company_name" <?php echo e($is_required??''); ?>>
<option value="">-- Select --</option>
<?php $__currentLoopData = $Organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usertype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($usertype->id??''); ?>"  <?php if(old('company_name',$company_id??0) == $usertype->id): ?> <?php echo e('selected'); ?> <?php endif; ?> ><?php echo e(ucwords($usertype->short_name??'')); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/masters/organisations.blade.php ENDPATH**/ ?>