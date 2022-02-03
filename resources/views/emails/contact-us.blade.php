@component('mail::message')
New Lead from the Contact us form.
Dear Admin,<br>
Here are the details:<br>
Name: {{$content['name']??''}}<br>
EMail - {{$content['email']??''}}<br>
Phone - {{$content['mobile']??''}}<br>
Message:<br>
{{$content['message']??''}}<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
