<?php
use App\Models\Wards;
$Wards=Wards::select('id','name')->orderBy('name', 'ASC')->get();
?>
 <div class="form-group">
<label><b>Ward</b><span class="text text-danger">*</span></label>
<select class="form-control" name="ward" id="ward" <?php echo e($is_required??''); ?>>
<option value="">-- Pick One --</option>
<?php $__currentLoopData = $Wards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usertype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($usertype->id??''); ?>" <?php echo e(old('ward',$existvalue??'') == $usertype->id ?'selected':''); ?> ><?php echo e(ucwords($usertype->name??'')); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/masters/wards.blade.php ENDPATH**/ ?>