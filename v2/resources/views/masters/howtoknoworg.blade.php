 <div class="form-group">
<label><b>Known about OMNI hospitals</b><span class="text text-danger">*</span></label>
<select class="form-control" name="know_about_hospital" id="know_about_hospital" {{$is_required??''}}>
<option value="">-- Pick One --</option>
<option value="1" @if(old('know_about_hospital')=='1')  selected @else @endif>I'm an existing patient and am happy with the hospital</option>
<option value="2" @if(old('know_about_hospital')=='2')  selected @else @endif>I was referred here by family/friend</option>
<option value="3" @if(old('know_about_hospital')=='3')  selected @else @endif>I heard/read good things about the hospital in my community/social media</option>
<option value="4" @if(old('know_about_hospital')=='4')  selected @else @endif>My doctor referred me to this hospital</option>
<option value="5" @if(old('know_about_hospital')=='5')  selected @else @endif>It was an emergency and this was the nearest hospital</option>
</select>
</div>