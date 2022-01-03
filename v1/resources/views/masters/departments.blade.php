<?php
use App\Models\Departments;
$Departments=Departments::where("organization_id",Auth::user()->organization_id)->orderBy('department_name', 'ASC')->get();
?>	

<label><b>Departments</b><span style="color: red;">(Optional)</span></label>
<select class="form-control" name="department" id="department" {{$is_required??''}}>
<option value="">-- Select --</option>
@foreach($Departments as $usertype)

<option value="{{$usertype->id??''}}" {{ old('department',$department??'') == $usertype->id ? 'selected':''}}>{{ucwords($usertype->department_name??'')}}</option>
@endforeach
</select>