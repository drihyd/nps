@component('mail::message')
New Lead from the Help/Feedback form.
Dear Admin,<br>
Here are the details:<br>
Name: {{$content['fullname']??''}}<br>
EMail - {{$content['email']??''}}<br>
Phone - {{$content['mobile']??''}}<br>
Issue - {{$content['issue']??''}}<br>
Message:<br>
{{$content['message']??''}}<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
