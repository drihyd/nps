@component('mail::message')
# Introduction

Found bug in the application.



@component('mail::panel') 
 {{$content}}
@endcomponent



Thanks,<br>
{{ config('app.name') }}
@endcomponent
