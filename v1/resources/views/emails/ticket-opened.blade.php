@component('mail::message')
#Customer given a negative feedback.<br>
#Name: {{Str::title($content['person_data']->firstname??'')}} <br> 
#Mobile: {{Str::title($content['person_data']->mobile??'')}}. <br><br>
@foreach($content['data'] as $person_response)
<p>{{$loop->iteration}}) {{ Str::replace('*teamname*', $person_response->option_value??'', $person_response->question_label??'') }}</p>&ensp;&nbsp;
@if($person_response->answeredby_person == '')
<p>A) {{Str::title($person_response->option_value??'')}}</p>
@else
<p>A) {{Str::title($person_response->answeredby_person??'')}}</p>
@endif
<br>
@endforeach
Thanks,<br>
{{ config('app.name') }}
@endcomponent
