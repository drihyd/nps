@component('mail::message')
<h1>Feedback Survey</h1>
Dear {{$content['name']??'Hello'}}<br><br>
Ticket/Reference Number: #{{Str::title($content['ticket_number']??'')}}<br>
#Please use following link for start your feedback survey<br>
<br><br>
@php
$linkurl = URL::to('offlinesurvey/'.$content['surveyid'].'/'.$content['loggedid'].'/'.$content['personid']);
@endphp
Select and copy the following URL to give your feedback.
{{$linkurl}}

<br><br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
