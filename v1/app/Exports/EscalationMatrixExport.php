<?php
namespace App\Exports;
use App\Models\Questions;
use App\Models\QuestionOptions;
use App\Models\SurveyAnswered;
use App\Models\Surveys;
use App\Models\SurveyPerson;
use App\Models\UpdateStatusResponseLog;
use App\Models\User;
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

class EscalationMatrixExport implements FromCollection,WithMapping, WithHeadings
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
		$final_heading=
		[	
			[		
			'Dept',
			'Level 1 - HOD',
			'Level 2 - Unit Head',
			'Level 3 - OPS Head',
			'Email ids -Level1',
			'Email ids -Level2',
			'Email ids -Level3',
			],
			
		

		]
		
		;
		
		

        return $final_heading;
    }
	
	public function collection()
    {
		/*
		$unithead = User::select('firstname','email','department')
		->where('users.organization_id',Session::get('companyID')??0)
		->where('role',2)->get()->first();
		*/		
		$responses_data = User::select('firstname','email','department','department_name')->whereNotNull('department')->where('department','>',0)
		->leftjoin('departments','users.department','=','departments.id')
		->orderby('departments.department_name','asc')
		->where('users.organization_id',Session::get('companyID')??0)		
		->get();
		return $responses_data;	
    }
	
   public function map($result_data=null): array
    {
		
		
		return [
			[
			Str::title($result_data->department_name??''),
			Str::title($result_data->firstname??''),
			Str::title($this->getunithead()->firstname??''),
			Str::title($this->getOPD()->firstname??''),
			Str::title($result_data->email??''),
			Str::title($this->getunithead()->email??''),
			Str::title($this->getOPD()->email??''),

			],
	
		
		]
		
		;	
    }	
	
	
	
	public function getunithead()
    {
	
		$unithead = User::select('firstname','email','department')
		->where('users.organization_id',Session::get('companyID')??0)
		->where('role',2)->get()->first();			
		return $unithead;	
    }
	
		public function getOPD()
    {
	
		$unitOPD = User::select('firstname','email','department')
		->where('users.organization_id',Session::get('companyID')??0)
		->where('role',5)->get()->first();			
		return $unitOPD;	
    }
	
	
}
