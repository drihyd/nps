@php
use App\Models\Departments;
$Departments=Departments::where("organization_id",Auth::user()->organization_id)->orderBy('department_name', 'ASC')->get();
@endphp
<div class="form-group mb-2">
<label><b>Teams</b><span style="color: red;">*</span></label>
<select class="form-control" name="team" id="team">
<option value="">-- All --</option>
@foreach($Departments as $usertype)

<option value="{{$usertype->id??''}}" {{ $team == $usertype->id ? 'selected':''}}>{{ucwords($usertype->department_name??'')}}</option>
@endforeach
</select>
</div>
