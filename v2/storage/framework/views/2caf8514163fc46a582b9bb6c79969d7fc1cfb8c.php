<?php
use App\Models\Surveys;
$surveys_data=Surveys::get();
?>
<div class="form-group mb-2">
<select id='question_id' name="question_id" class="form-control form-control-sm mx-sm-1">
<option value="">--Questionnaire--</option>
<?php $__currentLoopData = $surveys_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $survey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($survey->id); ?>" <?php echo e($quetion == $survey->id ? 'selected':''); ?>><?php echo e(ucwords($survey->title??'')); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>
<?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/admin/common_pages/surveys.blade.php ENDPATH**/ ?>