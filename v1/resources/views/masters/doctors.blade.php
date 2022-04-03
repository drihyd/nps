<?php
use App\Models\Doctors;
$Doctors=Doctors::select('doctors.id as did','doctors.doctor_name','specifications.name as sname')
->join('specifications','doctors.specification_id', '=', 'specifications.id')
->get();
?>	

 <div class="form-group">
<label><b>Doctors</b><span class="text text-danger">*</span></label>
<select class="form-control" name="doctor" id="doctor" {{$is_required??''}} >
<option value="">-- Pick One --</option>
@foreach($Doctors as $usertype)
<option value="{{$usertype->did??''}}" {{ old('doctor',$existvalue??'') == $usertype->did ?'selected':''}} >{{ucwords($usertype->doctor_name??'')}} <small>({{$usertype->sname??''}})</small></option>
@endforeach
</select>
</div>