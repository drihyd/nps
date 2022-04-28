@php
use App\Models\GroupLevel;
$group_level_data=GroupLevel::get();
@endphp
<div class="form-group mb-2">
<label><b>Level</b><span style="color: red;">*</span></label>
<select class="form-control" name="level" id="role">
  <option value="">-- All --</option>
  @foreach($group_level_data as $group_level)
    <option value="{{$group_level->id??''}}" {{ $level == $group_level->id ? 'selected':''}}>{{ucwords($group_level->name??'')}} - {{ucwords($group_level->alias??'')}}</option>
  @endforeach
</select>
</div>
