<?php
use App\Models\User;
$Users=User::select('users.id as uid','users.firstname as uname')
->where('users.role', 7)
->orderBy('users.firstname', 'ASC')
->get();
?>	

<label><b>Assign ticket<span class="text text-danger">*</span></b></label>
<select class="form-control" name="assigned" id="assigned" {{$is_required??''}}>
<option value="">-- Pick one --</option>
@foreach($Users as $usertype)

<option value="{{$usertype->uid??''}}" {{ old('assigned',$existvalue??'') == $usertype->uid ?'selected':''}} >{{ucwords($usertype->uname??'')}}</option>
@endforeach
</select>