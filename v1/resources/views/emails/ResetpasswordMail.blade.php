@component('mail::message')
<h1>Reset Password</h1>
@php
$link = URL::to('/').'/reset-password/'.$content['token'];
@endphp
Select and copy the following URL to change your password.
<br><br>
{{$link}}
<br><br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent