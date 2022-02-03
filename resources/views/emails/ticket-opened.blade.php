@component('mail::message')
<h2>NPS Score/Rating: {{Str::title($content['data'][0]->rating??'')}} </h2>

Ticket Number: {{Str::title($content['ticket_number']??'')}}<br>
Name: {{Str::title($content['person_data']->firstname??'')}}<br> 
Mobile: {{Str::title($content['person_data']->mobile??'')}}<br>
Email: {{Str::title($content['person_data']->email??'')}}<br>

Feedback Date: {{date('F j, Y', strtotime($content['person_data']->created_at??''))}}<br><br>
<h3>Areas of Improvement.</h3>
<table colspan=2 cellpadding=2 style="border-collapse: collapse;width: 100%;" border="border-collapse" >
<tbody>
@foreach($content['data'] as $person_response)
@if($person_response->answeredby_person != '')
<tr>
<td><b>{{$person_response->option_value??''}}</b></td>
<td>{{Str::title($person_response->department_activities??'')}}</td>
<td>{{Str::title($person_response->answeredby_person??'')}}</td>
</tr>
@endif
@endforeach					
</tbody>
</table><br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent