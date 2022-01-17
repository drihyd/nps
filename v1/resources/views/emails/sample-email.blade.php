@component('mail::message')
# Introduction

Sample test mail.

@component('mail::button', ['url' => {{env('APP_URL')}}])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
