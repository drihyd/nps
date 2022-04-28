 <div class="form-group">
<label><b>Feedback was given by</b><span class="text text-danger">*</span></label>
<select class="form-control" name="feedback_was_givenby" id="feedback_was_givenby" {{$is_required??''}} onchange="EnaDis_fdwasgivenby(this.value)">
<option value="">-- Pick One --</option>
<option value="patient" @if(old('feedback_was_givenby')=='patient')  selected @else @endif>Patient</option>
<option value="patient_attender" @if(old('feedback_was_givenby')=='patient_attender')  selected @else @endif>Patient Attender</option>
</select>
</div>