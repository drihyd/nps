@php
use App\Models\Departments;
$Departments=Departments::orderBy('department_name', 'ASC')->get();
@endphp
<div class="form-group mb-2">
<label><b>Department</b><span style="color: red;">*</span></label>
<select class="form-control form-control-sm" name="team" id="team">
<option value="">-- All --</option>
@foreach($Departments as $usertype)

<option value="{{$usertype->id??''}}" {{ $team == $usertype->id ? 'selected':''}}>{{ucwords($usertype->department_name??'')}}</option>
@endforeach
</select>
</div>
