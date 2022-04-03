<?php
use App\Models\User;
$Users=User::select('departments.department_name as dname','users.id as uid','users.email as uemail','users.firstname as uname')
->leftJoin('departments','departments.id', '=', 'users.department')
->orderBy('users.firstname', 'ASC')
->get();
?>	

<label><b>Reporting to</b><span style="color: red;">(Optional)</span></label>
<select class="form-control" name="reportingto" id="reportingto" {{$is_required??''}}>
<option value="">-- Select --</option>
@foreach($Users as $usertype)

<option value="{{$usertype->uid??''}}" {{ old('reportingto',$existvalue??'') == $usertype->uid ?'selected':''}} >{{ucwords($usertype->uname??'')}}-{{ucwords($usertype->uemail??'')}}-{{ucwords($usertype->dname??'')}}</option>
@endforeach
</select>