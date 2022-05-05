@php
use App\Models\Surveys;
$surveys_data=Surveys::get();
@endphp
<div class="form-group mb-2">
<label for="staticEmail2" class="sr-only"></label>
<select id='question_id' name="question_id" class="form-control form-control-sm">
<option value="">--Questionnaire--</option>
@foreach($surveys_data as $survey)
<option value="{{$survey->id}}" {{ $quetion == $survey->id ? 'selected':''}}>{{ucwords($survey->title??'')}}</option>
@endforeach
</select>
</div>

