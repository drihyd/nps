<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Questions;
use App\Models\QuestionOptions;
use App\Models\SurveyAnswered;
use App\Models\Surveys;
use App\Models\SurveyPerson;
use App\Models\UpdateStatusResponseLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Carbon;
Use Exception;
use Validator;
use Auth;
use Session;
use Config;

class ResponsesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // $addition_params=$this->data;
        // $from_date=$addition_params['fd']??'';
        // $to_date=$addition_params['td']??'';
        $role=auth()->user()->role??0;
       $Detractors = SurveyAnswered::select('survey_persons.*','survey_answered.rating as answer','survey_answered.ticket_status as ticket_status','survey_answered.updated_at as last_action_date','surveys.title as survey_title')
            ->leftJoin('survey_persons','survey_persons.id', '=', 'survey_answered.person_id')
            ->leftJoin('surveys','surveys.id', '=', 'survey_answered.survey_id')
            ->where('survey_persons.organization_id',Auth::user()->organization_id)             
            ->whereIn('survey_answered.rating',[0,1,2,3,4,5,6])  
            ->whereIn('survey_answered.question_id',[1,11])
            ->orderBy('survey_persons.created_at','DESC')
            ->get();
            
        // dd($Detractors);
        return $Detractors;
    }
}
