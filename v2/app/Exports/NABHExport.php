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

class NABHExport implements FromCollection,WithMapping, WithHeadings
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
			'Department',
			'Total Feedback',
		];
        return $final_heading;
    }
	
	public function collection(Request $request)
    {
		
		$PageTitle="NABH Reports";
$role=auth()->user()->role??0;	
$user_mapped_departments=Departments_Users::where('user_id',auth()->user()->id??0)->get()->pluck('department_id');

if(isset($request->team)) {					
$QuestionOptions=QuestionOptions::select()
->where('option_value',$request->team)
->pluck('id');				
}		
else{
$QuestionOptions=QuestionOptions::pluck('id');				
}


if($request->from_date &&  $request->to_date) {
$from_date = $request->from_date;
$to_date = $request->to_date;			
}		
else{
$from_date = date('Y-01-01');
$to_date = date('Y-12-t');
}			
$ViewAttendance = RatingOfDepartment::select("rating_of_departments.department_name as departmentname",
DB::raw('count(IF(rating_of_departments.rating between 0 and 8, 1, NULL)) as Total_Detractors'),
DB::raw('count(IF(rating_of_departments.rating between 9 and 10, 1, NULL)) as Total_Promoters'),
)
->where(function($ViewAttendance) use ($from_date,$to_date){	
if($from_date &&  $to_date){	
$ViewAttendance->whereDate('rating_of_departments.created_at', '>=', "$from_date 00:00:00");
$ViewAttendance->whereDate('rating_of_departments.created_at', '<=',"$to_date 23:59:59");
}		
})


->where(function($ViewAttendance) use ($role,$user_mapped_departments){				
if($role==2){

}

else if($role==3){	
	$ViewAttendance->whereIn('rating_of_departments.department_id',$user_mapped_departments);	
}			
else if($role==4){				
	$ViewAttendance->where('rating_of_departments.logged_user_id',auth()->user()->id??0);
}
else{

}

})
->orderBy("rating_of_departments.department_name","asc")
->groupBy("rating_of_departments.department_name")
->get();
	 
return $ViewAttendance;
	
    }
	
   public function map($feedback_data=null): array
    {

		/* Payment data get from the collection function */
		
		
		
	
		


$Total_Promoters=$feedback_data->->Total_Promoters??0;
$Total_Detractors=$feedback_data->Total_Detractors??0;

return [
		

		Str::title($orgname->departmentname??''),
		Str::title($Total_Detractors+$Total_Promoters),
		
	
		];

	
    }
    
	
	
	
	
	
}



