 <div class="form-group">
<label><b>Feedback was given by</b><span class="text text-danger">*</span></label>
<select class="form-control" name="feedback_was_givenby" id="feedback_was_givenby" <?php echo e($is_required??''); ?> onchange="EnaDis_fdwasgivenby(this.value)">
<option value="">-- Pick One --</option>
<option value="patient">Patient</option>
<option value="patient_attender">Patient Attender</option>
</select>
</div><?php /**PATH C:\xampp\htdocs\nps\v1\resources\views/masters/feedbackby.blade.php ENDPATH**/ ?>