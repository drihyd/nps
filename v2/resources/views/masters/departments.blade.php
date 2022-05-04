<?php
use App\Models\Departments;
$Departments=Departments::orderBy('department_name', 'ASC')->get();
$multiple=$multipleselect??'';
$department=$department??"";
if(isset($department)){
	$department=$department;
}
else{
	$department=[0];
}
if(isset($isoption)){
	$isoption=$isoption;
}
else{
	$isoption="";
}
?>	



<div class="form-group mb-2">
@if($isoption)
<label><b>Team/Department</b><span style="color: red;">(Optional)</span></label>
@else
@endif
<select class="form-control"  id="department" {{$is_required??''}} @if($multiple=="yes") multiple="multiple" name="department[]" @else  name="department" @endif>
<option value="">-- Departments --</option>


	@foreach($Departments as $usertype)
	<option value="{{$usertype->id??''}}"
	
	
	@if(isset($department) &!empty($department))
	@if(in_array($usertype->id,$department))
		selected
	@else
		""		
	@endif	
	
	@endif
	
	>{{ucwords($usertype->department_name??'')}}</option>
	@endforeach

</select>
</div>