<?php
use App\Models\User;
$Users=User::select('departments.department_name as dname','users.id as uid','users.firstname as uname')
->leftJoin('departments','departments.id', '=', 'users.department')
->whereNotIn('users.id',[auth()->user()->id??0])             
->where('users.role', 3)
->orderBy('users.firstname', 'ASC')
->get();
?>

<label><b>HOD <span class="text text-danger">*</span></b></label>
<select class="form-control" name="hod_user" id="hod_user" {{$is_required??''}}>
<option value="">-- Pick one --</option>
@foreach($Users as $usertype)

<option value="{{$usertype->uid??''}}" {{ old('hod_user',$existvalue??'') == $usertype->uid ?'selected':''}} >{{ucwords($usertype->uname??'')}}-{{ucwords($usertype->dname??'')}}</option>
@endforeach
</select>