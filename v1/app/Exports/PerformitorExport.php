<?php
namespace App\Exports;
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
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;

class PerformitorExport implements FromCollection,WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
	private $data;
	public function __construct(array $data = [])
	{
	$this->data = $data; 
	}
	
	 public function headings(): array
    {
        $addition_params=$this->data;
		$final_heading=[		
			'Unit Name',
			'No. of Patients Discharged',
			'No. of Feedbacks Collected',
			'Promoters',
			'Passives',
			'Detractors',
			'Grand Total'
		];
        return $final_heading;
    }
	
	public function collection()
    {
		
		$Post_DischargeID=Surveys::select('id')->pluck('id')->last();
		$Post_DischargeID=$Post_DischargeID??0;

		$addition_params=$this->data;
		$category_id=$addition_params['category_id']??'';
		$from_date=$addition_params['fd']??'';
		$to_date=$addition_params['td']??'';
		
		$responses_data = SurveyAnswered::select(
		"survey_answered.organization_id",
		DB::raw("
		(SELECT count(survey_persons.id) FROM survey_persons WHERE survey_persons.rating in (0,1,2,3,4,5,6))  as Total_Detractors,
		(SELECT count(survey_persons.id) FROM survey_persons WHERE survey_persons.rating in (7,8))  as Total_Passives,
		(SELECT count(survey_persons.id) FROM survey_persons WHERE survey_persons.rating in (9,10))  as Total_Promoters,
		(SELECT count(survey_persons.id) FROM survey_persons WHERE survey_persons.rating in (0,1,2,3,4,5,6,7,8,9,10) )  as Total_Feedback_Collected,
		(SELECT count(survey_persons.id) FROM survey_persons WHERE survey_persons.survey_id in ($Post_DischargeID))  as Total_Patient_Discharged
		")
		)
		
		->where(function($responses_data) use ($from_date,$to_date){	
		if($from_date &&  $to_date){		
		$responses_data->whereDate('survey_persons.created_at', '>=', "$from_date 00:00:00");
		$responses_data->whereDate('survey_persons.created_at', '<=',"$to_date 23:59:59");
		}		
		})

		->groupBy('survey_answered.organization_id')
		->get();				
		return $responses_data;
	
    }
	
   public function map($feedback_data=null): array
    {

		/* Payment data get from the collection function */
		
		$orgname = DB::table('organizations')->select('company_name')->where('id',$feedback_data->organization_id)->get()->first();
		return [
		

		Str::title($orgname->company_name??'')	,
		Str::title($feedback_data->Total_Patient_Discharged),
		Str::title($feedback_data->Total_Feedback_Collected),
		Str::title($feedback_data->Total_Promoters),
		Str::title($feedback_data->Total_Passives),
		Str::title($feedback_data->Total_Detractors),
		Str::title($feedback_data->Total_Patient_Discharged+$feedback_data->Total_Feedback_Collected+$feedback_data->Total_Promoters+$feedback_data->Total_Passives+$feedback_data->Total_Detractors),
	
		];

	
    }
    
	
	
	
	
	
}



