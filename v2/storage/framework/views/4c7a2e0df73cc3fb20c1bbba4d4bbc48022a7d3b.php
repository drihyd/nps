
<?php if(Auth::user()): ?>
<?php
$surveys_data=DB::table('surveys')->where('organization_id',Auth::user()->organization_id)->get()->first();
?>
<?php endif; ?>

<div class="formify_header">
<h4 class="form_title"></h4>
<p><?php echo e($surveys_data->description??''); ?></p>
<div class="border ml-0"></div>
</div><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/frontend/common_pages/survey_description.blade.php ENDPATH**/ ?>