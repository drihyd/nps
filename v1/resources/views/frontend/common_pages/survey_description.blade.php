
@if(Auth::user())
@php
$surveys_data=DB::table('surveys')->where('organization_id',Auth::user()->organization_id)->get()->first();
@endphp
@endif

<div class="formify_header">
<h4 class="form_title"></h4>
<p>{{$surveys_data->description??''}}</p>
<div class="border ml-0"></div>
</div>