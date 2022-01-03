<?php
use App\Models\Country;
$countries=Country::orderBy('country_name', 'ASC')->where('country_code','IN')->get();
$is_required=$is_required??'';
?>	
<select name="country" id="country" class="form-control form-control-sm" @if($is_required=="yes") required="required" @else @endif>
<option value="">--Select--</option>
@foreach ($countries as $country)
<option value="{{Str::lower($country->country_name)??''}}" @if(old('country',$default) == Str::lower($country->country_name)) {{ 'selected' }} @endif >{{$country->country_name}}</option>
@endforeach 
</select>