@php
$user_type_data=DB::table('user_types')->whereNotIn('user_types.id',[1,2])->get();
@endphp
<div class="form-group mb-2">
<label><b>Designation</b><span style="color: red;">*</span></label>
<select class="form-control" name="role" id="role">
  <option value="">-- All --</option>
  @foreach($user_type_data as $usertype)
    <option value="{{$usertype->id??''}}" {{ $role == $usertype->id ? 'selected':''}}>{{ucwords($usertype->name??'')}}</option>
  @endforeach
</select>
</div>
