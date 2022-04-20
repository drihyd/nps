@component('mail::message')
<h1>Feedback Survey</h1>
Dear {{$content['name']??'Hello'}}<br><br>
Reference Number: #{{Str::title($content['ticket_number']??'')}}<br>
The survey takes just two minutes to complete and your feedback will be of great help to us in the work to improve our service.<br>
Thank you for your help!<br>
#Please use following link for start your feedback survey<br>
<br><br>
@php
$linkurl = URL::to('offlinesurvey/'.$content['surveyid'].'/'.$content['loggedid'].'/'.$content['personid']);
@endphp

@component('mail::button', ['url' => $linkurl])
{{__('Start Survey')}}
@endcomponent

<br><br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
