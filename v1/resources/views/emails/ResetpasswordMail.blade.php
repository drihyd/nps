@component('mail::message')
<h1>Reset Password</h1>
Dear {{$content['name']??'Hello'}}<br><br>
#Login Username: {{$content['email']}}<br>
#Login Password: {{$content['password']}}<br>
<br><br>
@php
$linkurl = URL::to('/');
@endphp
Select and copy the following URL to login your account.
{{$linkurl}}
<br><br>
After logged in your account go to reset password link for update your own password.
<br><br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent