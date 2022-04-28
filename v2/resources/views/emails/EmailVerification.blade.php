@component('mail::message')
Dear {{$content['name']??'Hello'}}<br>
Thanks for signing up! Before getting started, could you verify your email address by clicking on the link.
<br><br>
@php
$link = URL::to('/').'/account/verify/'.$content['token'];
@endphp
<br>
Select and copy the following URL to activate your account.
<br>
{{$link}}
<br><br>
Regards,<br>
{{ config('app.name') }}
@endcomponent