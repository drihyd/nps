<?php
use App\Models\Wards;
$Wards=Wards::select('id','name')->orderBy('name', 'ASC')->get();
?>
 <div class="form-group">
<label><b>Ward</b><span class="text text-danger">*</span></label>
<select class="form-control" name="ward" id="ward" {{$is_required??''}}>
<option value="">-- Pick One --</option>
@foreach($Wards as $usertype)
<option value="{{$usertype->id??''}}" {{ old('ward',$existvalue??'') == $usertype->id ?'selected':''}} >{{ucwords($usertype->name??'')}}</option>
@endforeach
</select>
</div>