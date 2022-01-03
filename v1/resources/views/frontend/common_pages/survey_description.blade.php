
@if(Auth::user())
@php
$surveys_data=DB::table('surveys')->where('organization_id',Auth::user()->organization_id)->get()->first();
@endphp
@endif

<div class="formify_header">
<h5 class="form_title" style="font-size:18px;">
Questionnaire: {{$surveys_data->title??''}}
</h5>
<div class="border ml-0"></div>
</div>