
<?php if(Auth::user()): ?>
<?php
$surveys_data=DB::table('surveys')->where('id',Session::get('selected_survey_id')??0)->where('organization_id',Auth::user()->organization_id)->get()->first();
?>
<?php endif; ?>

<div class="formify_header">
<h5 class="form_title" style="font-size:18px;">
Questionnaire: <?php echo e($surveys_data->title??''); ?>

</h5>
<div class="border ml-0"></div>
</div><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/frontend/common_pages/survey_description.blade.php ENDPATH**/ ?>