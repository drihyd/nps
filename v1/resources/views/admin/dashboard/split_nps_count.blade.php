@php
use App\Models\Departments;
use App\Models\QuestionOptions;
use App\Models\SurveyAnswered;

$Departments=Departments::select()
->where('organization_id',auth()->user()->organization_id)
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
				

				
$QuestionOptions=QuestionOptions::select()
->where('option_value',$item->department_name)
->pluck('id');



$Promoters=SurveyAnswered::select('id')
->leftJoin('question_options','question_options.id', '=', 'survey_answered.answerid')
->where('survey_answered.organization_id',auth()->user()->organization_id)
->whereIn('survey_answered.answerid',$QuestionOptions)
->where('survey_answered.logged_user_id',auth()->user()->id??0)
->where('survey_answered.answeredby_person','!=','')
->whereIn('survey_answered.rating',[9,10])
->count();


$Passives=SurveyAnswered::select('id')
->leftJoin('question_options','question_options.id', '=', 'survey_answered.answerid')
->where('survey_answered.organization_id',auth()->user()->organization_id)
->whereIn('survey_answered.answerid',$QuestionOptions)
->where('survey_answered.logged_user_id',auth()->user()->id??0)
->where('survey_answered.answeredby_person','!=','')
->whereIn('survey_answered.rating',[7,8])
->count();


$Detractors=SurveyAnswered::select('id')
->leftJoin('question_options','question_options.id', '=', 'survey_answered.answerid')
->where('survey_answered.organization_id',auth()->user()->organization_id)
->whereIn('survey_answered.answerid',$QuestionOptions)
->where('survey_answered.logged_user_id',auth()->user()->id??0)
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
										<table class="table table-responsive table-bordered" style="background-color: #FFF">
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

								<!--
								<div class="bg-light-gradient" style="border-radius: 8px; padding-top:18px; padding-bottom:0px; padding-left:12px; padding-right:12px">
									<div class="row">
										
									<div class="col-md-2">
										<img src="{{URL::to('assets/icons/moderate.svg')}}" style="width:45px" alt="happy"/>
									</div>
									<div class="col-md-6">
										<div >
                                        	<p class="mb-0" style="text-align: left">02</p>
                                        	<h5 class="mb-0" style="text-align: left">Doctors</h5>                      
                                    	</div>
									</div>
									<div class="col-md-4">
										<div class="pull-right">
										<table class="table table-responsive table-bordered" style="background-color: #FFF">
										<tr>
										<td><p style="color:#119460">15</p></td>
										<td><p style="color:#FF981F">10</p></td>
										<td><p style="color:#ff654d">10</p></td>
										</tr>
										</table>
										</div>
									</div>
									</div>
								</div> 
								
								
								<div style="min-height:1px">&nbsp;</div>
								
								<div class="bg-light-gradient" style="border-radius: 8px; padding-top:18px; padding-bottom:0px; padding-left:12px; padding-right:12px">
									<div class="row">
										
									<div class="col-md-2">
										<img src="{{URL::to('assets/icons/sad.svg')}}" style="width:45px" alt="happy"/>
									</div>
									<div class="col-md-6">
										<div >
                                        	<p class="mb-0" style="text-align: left">03</p>
                                        	<h5 class="mb-0" style="text-align: left">Billing</h5>                      
                                    	</div>
									</div>
									<div class="col-md-4">
										<div class="pull-right">
										<table class="table table-responsive table-bordered" style="background-color: #FFF">
										<tr>
										<td><p style="color:#119460">10</p></td>
										<td><p style="color:#FF981F">15</p></td>
										<td><p style="color:#ff654d">12</p></td>
										</tr>
										</table>
										</div>
									</div>
									</div>
								</div>
								
								-->
								
								
								
								
								
                            </div>
                        </div>


@else
	
@endif





<!--

        <div class="card m-b-30" style="min-height:200px">

            <div class="card-body text-center">
                <div class="course-slider">
                    <div class="course-slider-item">
                        <h4 class="my-0 pull-left">Net Promoter Score</h4>
                        <div class="clearfix"></div>
                        <div class="row align-items-center my-4 py-3">
                            <div class="col-4 py-3 px-0  success-rgba text-success">
                                <h4 class="text-danger">{{$final_score->Promoters??''}}</h4>
                                <p class="text-danger mb-0">Promoters</p>
                            </div>
							
							
							 <div class="col-4 py-3 px-0 danger-rgba text-danger">
                                <h4>{{$final_score->Detractors??''}}</h4>
                                <p class="mb-0">Detractors</p>
                            </div>
							
                            <div class="col-4 py-3 px-0 primary-rgba text-primary">
                                <h4 class="text-warning">{{$final_score->Neutral??''}}</h4>
                                <p class="text-warning mb-0">Neutral</p>
                            </div>
                           
                        </div>
                        
                        
                    </div>
                    
                    
                </div>                                        
            </div>
        </div>
		
		-->
		
		
		
    </div>