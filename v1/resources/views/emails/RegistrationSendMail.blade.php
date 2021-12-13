@component('mail::message')
<h1>Registration confirmation</h1>
Dear {{$content['name']??'Hello'}}<br><br>
Congratulations on registering with us. Now you can get all the inside information on products! Please login to enjoy shopping with us.<br>
Regards,<br>
{{ config('app.name') }}
@endcomponent
