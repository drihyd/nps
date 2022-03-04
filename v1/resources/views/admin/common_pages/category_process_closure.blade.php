@php
use App\Models\Process;
$Process=Process::orderBy('name','asc')->get();
@endphp
<select  class="form-control" name="category_process" id="category_process">
<option value="">--Pick one--</option>
@foreach($Process as $item)
<option value="{{$item->slug}}">{{$item->name??''}}</option>
@endforeach
</select>


