@php
use App\Models\Surveys;
$surveys_data=Surveys::where('organization_id',Auth::user()->organization_id)->get();
@endphp
<div class="form-group mb-2">
<!-- <label>Questionnaire</label> -->

<select id='question_id' name="question_id" class="form-control mx-sm-1">
<option value="">--All Questionnaire--</option>
@foreach($surveys_data as $survey)
<option value="{{$survey->id}}" {{ $quetion == $survey->id ? 'selected':''}}>{{ucwords($survey->title??'')}}</option>
@endforeach
</select>
</div>
