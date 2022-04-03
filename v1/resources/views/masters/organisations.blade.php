<?php
use App\Models\Organizations;
$Organizations=Organizations::select('id','company_name','short_name')->orderBy('short_name', 'ASC')->get();
?>	
@if($is_required)
<label><b>Organizations </b><span class="text text-danger">*</span></label>
@else
<label><b>Organizations</b></label>	
@endif
<select class="form-control" name="company_name" id="company_name" {{$is_required??''}}>
<option value="">-- Select --</option>
@foreach($Organizations as $usertype)
<option value="{{$usertype->id??''}}"  @if(old('company_name',$company_id??0) == $usertype->id) {{ 'selected' }} @endif >{{ucwords($usertype->short_name??'')}}</option>
@endforeach
</select>