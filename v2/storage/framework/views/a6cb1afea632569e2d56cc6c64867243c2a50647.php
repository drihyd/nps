<?php
use App\Models\Doctors;
$Doctors=Doctors::select('doctors.id as did','doctors.doctor_name','specifications.name as sname')
->join('specifications','doctors.specification_id', '=', 'specifications.id')
->get();
?>	

 <div class="form-group">
<label><b>Doctors</b><span class="text text-danger">*</span></label>
<select class="form-control" name="doctor" id="doctor" <?php echo e($is_required??''); ?> >
<option value="">-- Pick One --</option>
<?php $__currentLoopData = $Doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usertype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($usertype->did??''); ?>" <?php echo e(old('doctor',$existvalue??'') == $usertype->did ?'selected':''); ?> ><?php echo e(ucwords($usertype->doctor_name??'')); ?> <small>(<?php echo e($usertype->sname??''); ?>)</small></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/masters/doctors.blade.php ENDPATH**/ ?>