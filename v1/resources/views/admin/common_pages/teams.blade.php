@php
use App\Models\Departments;
$teams=Departments::where('organization_id',Auth::user()->organization_id)->orderBy('department_name','asc')->get();
@endphp
<div class="form-group mb-2">
<label for="Teams" class="sr-only">Teams</label>
<select  class="form-control" name="department_id" id="department_id" required="required">
<option value="">-- All --</option>
@foreach($teams as $department)
<option value="{{$department->department_name}}" {{ old('department_id',$activities_data->department_id??'') == $department->id ? 'selected':''}}>{{$department->department_name??''}}</option>
@endforeach
</select>
</div>
