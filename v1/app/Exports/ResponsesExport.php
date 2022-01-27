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

class ResponsesExport implements FromCollection,WithMapping, WithHeadings
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
			'Date of Consultation',
			'Month Name',
			'Name',
			'Email',
			'Phone',
			'Process',
			'Department',
			'Doctor',
			'UHID',
			'NPS Score',
			'Status',
			'Reasons for NPS',
			'Known about OMNI Hospitals',
			'Suggestions',
			'Feedback was given by',
			'Completed Date',
			'Filled By',
			'History/log',
			'Final Action'
		];
        return $final_heading;
    }
	
	public function collection()
    {
		$addition_params=$this->data;
		$category_id=$addition_params['category_id']??'';
		$from_date=$addition_params['fd']??'';
		$to_date=$addition_params['td']??'';
		
		$Detractors = SurveyAnswered::select('survey_persons.*','survey_answered.rating as answer','survey_answered.ticket_status as ticket_status','survey_answered.updated_at as last_action_date','surveys.title as survey_title')
		->leftJoin('survey_persons','survey_persons.id', '=', 'survey_answered.person_id')
		->leftJoin('surveys','surveys.id', '=', 'survey_answered.survey_id')
		->where('survey_persons.organization_id',Auth::user()->organization_id)             
		->whereIn('survey_answered.rating',[0,1,2,3,4,5,6])  
		->whereIn('survey_answered.question_id',[1,11])
		->orderBy('survey_persons.created_at','DESC')
		->get();
		

		return $Detractors;
	
    }
	
   public function map($feedback_data=null): array
    {

		/* Payment data get from the collection function */
		return [
		
		date('d-m-yy', strtotime($feedback_data->created_at)),	
		"",
		Str::title($feedback_data->firstname),
		Str::title($feedback_data->email),
		Str::title($feedback_data->mobile),
		"",
		"",
		"",
		"",
		"",
		Str::title($feedback_data->ticket_status),
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		""
		];

	
    }
    
	
	
	
	
	
}



