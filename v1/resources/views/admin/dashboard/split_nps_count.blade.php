@php
use App\Models\Departments;
use App\Models\QuestionOptions;
use App\Models\SurveyAnswered;
$role=auth()->user()->role??0;

$Departments=Departments::select()
->where('organization_id',auth()->user()->organization_id)
->where(function($Departments) use ($role){	
	if($role==2){
	}
	else if($role==3){	
	$Departments->where('id','=',auth()->user()->department??0);
	}	
	else if($role==4){	
	}
	else{	
	}

})
->Orderby('department_name','asc')
->get();




@endphp

<div class="col-lg-6 col-xl-6">

@if($final_score->Promoters>0 || $final_score->Neutral>0 || $final_score->Detractors>0 )

<div class="card m-b-30" style="min-height:372px">
						
						
                            <div class="card-header">                                
                                <h5 class="card-title mb-0">Departments</h5>
                            </div>
							
							
							
							
                            <div class="card-body text-center">
							
							
							
							@if($Departments)
								
							
							@foreach($Departments as $key=>$item)
							
							
							
							@php
							
							
							
if(isset($request->team)) {					
$QuestionOptions=QuestionOptions::where('option_value',$request->team)
->pluck('id');				
}		
else{
$QuestionOptions=QuestionOptions::pluck('id');				

}
							
				

		
		
$QuestionOptions=QuestionOptions::select()
->where('option_value',$item->department_name)
->pluck('id');



$Promoters=SurveyAnswered::select('id')
->leftJoin('question_options','question_options.id', '=', 'survey_answered.answerid')
->where('survey_answered.organization_id',auth()->user()->organization_id)
->whereIn('survey_answered.answerid',$QuestionOptions)

->where(function($Promoters) use ($role){	
if($role==2){	

}
else if($role==3){
	
	if(auth()->user()->department){
	$q_departments=QuestionOptions::where('department_id',auth()->user()->department??00)->get()->pluck('id');
	$Promoters->whereIn('survey_answered.department_name_id',$q_departments);	
	}				

}	
else if($role==4){				
	$Promoters->where('survey_answered.logged_user_id',auth()->user()->id??0);
}

else{
	$Promoters->where('survey_answered.logged_user_id',auth()->user()->id??0);
}	
})

->where('survey_answered.answeredby_person','!=','')
->whereIn('survey_answered.rating',[9,10])
->count();


$Passives=SurveyAnswered::select('id')
->leftJoin('question_options','question_options.id', '=', 'survey_answered.answerid')
->where('survey_answered.organization_id',auth()->user()->organization_id)
->whereIn('survey_answered.answerid',$QuestionOptions)
->where(function($Passives) use ($role){	
if($role==2){	

}
else if($role==3){
	
	if(auth()->user()->department){
	$q_departments=QuestionOptions::where('department_id',auth()->user()->department??00)->get()->pluck('id');
	$Passives->whereIn('survey_answered.department_name_id',$q_departments);	
	}				

}	
else if($role==4){				
	$Passives->where('survey_answered.logged_user_id',auth()->user()->id??0);
}

else{
	$Passives->where('survey_answered.logged_user_id',auth()->user()->id??0);
}	
})
->where('survey_answered.answeredby_person','!=','')
->whereIn('survey_answered.rating',[7,8])
->count();


$Detractors=SurveyAnswered::select('id')
->leftJoin('question_options','question_options.id', '=', 'survey_answered.answerid')
->where('survey_answered.organization_id',auth()->user()->organization_id)
->whereIn('survey_answered.answerid',$QuestionOptions)
->where(function($Detractors) use ($role){	
if($role==2){	

}
else if($role==3){
	
	if(auth()->user()->department){
	$q_departments=QuestionOptions::where('department_id',auth()->user()->department??00)->get()->pluck('id');
	$Detractors->whereIn('survey_answered.department_name_id',$q_departments);	
	}				

}	
else if($role==4){				
	$Detractors->where('survey_answered.logged_user_id',auth()->user()->id??0);
}

else{
	$Detractors->where('survey_answered.logged_user_id',auth()->user()->id??0);
}	
})
->where('survey_answered.answeredby_person','!=','')
->whereIn('survey_answered.rating',[0,1,2,3,4,5,6])
->count();

$icons=array("p"=>$Promoters??0,"n"=>$Passives??0,"d"=>$Detractors??0);
$value =current(array_keys($icons, max($icons)));

$totalcount=$Promoters+$Passives+$Detractors;

@endphp
                               
							   <div class="bg-light-gradient" style="border-radius: 8px; padding-top:18px; padding-bottom:0px; padding-left:12px; padding-right:12px">
									<div class="row">
										
									<div class="col-md-2">
									
									
									@if($totalcount==0)
										<img src="{{URL::to('assets/icons/moderate.svg')}}" style="width:45px" alt="sad"/>
									@else
										
									@if($value=="p")									
										<img src="{{URL::to('assets/icons/happy.svg')}}" style="width:45px" alt="happy"/>
									@elseif($value=="n")
										<img src="{{URL::to('assets/icons/moderate.svg')}}" style="width:45px" alt="moderate"/>
									@elseif($value=="d")
										<img src="{{URL::to('assets/icons/sad.svg')}}" style="width:45px" alt="sad"/>
							
										@else
											
										@endif
										
										
										
										@endif
									
									</div>
									<div class="col-md-6">
										
                                        <a href="{{route('filter.responses',['team'=>$item->department_name])}}">										
                                        	<h5 class="mb-0 " style="text-align: center;padding-top:10px;">										
											{{Str::title($item->department_name)}}											
											</h5> 

											</a>											
                                    	
									</div>
									<div class="col-md-4">
										<div class="pull-right">
										<table class="table table-responsive count-table">
										<tr>
										<td><p style="color:#119460">{{$Promoters??0}}</p></td>
										<td><p style="color:#FF981F">{{$Passives??0}}</p></td>
										<td><p style="color:#ff654d">{{$Detractors??0}}</p></td>
										</tr>
										</table>
										</div>
									</div>
									</div>
								</div> 
								<div style="min-height:1px">&nbsp;</div> 
								
								@endforeach
								
								@else
								
								@endif

								
								
								
								
								
								
                            </div>
                        </div>


@else
	
@endif



		
		
		
    </div>