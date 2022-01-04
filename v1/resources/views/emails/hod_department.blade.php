@component('mail::message')
<h2>NPS Score/Rating: {{Str::title($content['nps_score']??'')}} </h2>
Name: {{Str::title($content['person_data']->firstname??'')}}<br> 
Mobile: {{Str::title($content['person_data']->mobile??'')}}<br>
Email: {{Str::title($content['person_data']->email??'')}}<br>
Feedback Date: {{date('F j, Y', strtotime($content['person_data']->created_at??''))}}<br><br>
<h3>Areas of Improvement.</h3>
<table colspan=2 cellpadding=2 style="border-collapse: collapse;width: 100%;" border="border-collapse" >
<tbody>

<tr>
<td><b>{{Str::title($content['Dep_name']??'')}}</b></td>
<td>{{Str::title($content['Dep_activities']??'')}}</td>
<td>{{Str::title($content['Dep_note']??'')}}</td>
</tr>
				
</tbody>
</table><br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent