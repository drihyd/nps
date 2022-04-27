<?php
use App\Models\Process;
$Process=Process::orderBy('name','asc')->get();
?>
<select  class="form-control" name="category_process" id="category_process">
<option value="">--Pick one--</option>
<?php $__currentLoopData = $Process; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($item->slug); ?>"><?php echo e($item->name??''); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>


<?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/common_pages/category_process_closure.blade.php ENDPATH**/ ?>