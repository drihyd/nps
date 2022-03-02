@php
use App\Models\Departments;
$teams=Departments::where('organization_id',Auth::user()->organization_id)->orderBy('department_name','asc')->get();
@endphp


@if(isset(auth()->user()->role) && auth()->user()->role==3)
<div class="form-group mb-2">
<label for="Teams" class="sr-only">Teams</label>
<select  class="form-control form-control-sm" name="team" id="team">
<option value="">--Teams--</option>
@foreach($teams as $department)
@if(auth()->user()->department==$department->id)
<option selected value="{{$department->department_name}}" {{ $pickteam == $department->department_name ? 'selected':''}}>{{$department->department_name??''}}</option>
@endif

@endforeach
</select>
</div>

	
@else

<div class="form-group mb-2">
<label for="Teams" class="sr-only">Teams</label>
<select  class="form-control form-control-sm" name="team" id="team">
<option value="">--Teams--</option>
@foreach($teams as $department)
<option value="{{$department->department_name}}" {{ $pickteam == $department->department_name ? 'selected':''}}>{{$department->department_name??''}}</option>
@endforeach
</select>
</div>


@endif
