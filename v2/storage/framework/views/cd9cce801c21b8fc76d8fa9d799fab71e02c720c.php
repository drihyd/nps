<?php
use App\Models\Departments;
use App\Models\QuestionOptions;
use App\Models\SurveyAnswered;

$Departments=Departments::select()
->where('organization_id',auth()->user()->organization_id)
->Orderby('department_name','asc')
->get();




?>

<div class="col-lg-6 col-xl-6">

<?php if($final_score->Promoters>0 || $final_score->Neutral>0 || $final_score->Detractors>0 ): ?>

<div class="card m-b-30" style="min-height:372px">
						
						
                            <div class="card-header">                                
                                <h5 class="card-title mb-0">Departments</h5>
                            </div>
							
							
							
							
                            <div class="card-body text-center">
							
							
							
							<?php if($Departments): ?>
								
							
							<?php $__currentLoopData = $Departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							
							
							
							<?php
				

		$role=auth()->user()->role??0;
		
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

?>
                               
							   <div class="bg-light-gradient" style="border-radius: 8px; padding-top:18px; padding-bottom:0px; padding-left:12px; padding-right:12px">
									<div class="row">
										
									<div class="col-md-2">
									
									
									<?php if($totalcount==0): ?>
										<img src="<?php echo e(URL::to('assets/icons/moderate.svg')); ?>" style="width:45px" alt="sad"/>
									<?php else: ?>
										
									<?php if($value=="p"): ?>									
										<img src="<?php echo e(URL::to('assets/icons/happy.svg')); ?>" style="width:45px" alt="happy"/>
									<?php elseif($value=="n"): ?>
										<img src="<?php echo e(URL::to('assets/icons/moderate.svg')); ?>" style="width:45px" alt="moderate"/>
									<?php elseif($value=="d"): ?>
										<img src="<?php echo e(URL::to('assets/icons/sad.svg')); ?>" style="width:45px" alt="sad"/>
							
										<?php else: ?>
											
										<?php endif; ?>
										
										
										
										<?php endif; ?>
									
									</div>
									<div class="col-md-6">
										
                                        <a href="<?php echo e(route('filter.responses',['team'=>$item->department_name])); ?>">										
                                        	<h5 class="mb-0 " style="text-align: center;padding-top:10px;">										
											<?php echo e(Str::title($item->department_name)); ?>											
											</h5> 

											</a>											
                                    	
									</div>
									<div class="col-md-4">
										<div class="pull-right">
										<table class="table table-responsive count-table">
										<tr>
										<td><p style="color:#119460"><?php echo e($Promoters??0); ?></p></td>
										<td><p style="color:#FF981F"><?php echo e($Passives??0); ?></p></td>
										<td><p style="color:#ff654d"><?php echo e($Detractors??0); ?></p></td>
										</tr>
										</table>
										</div>
									</div>
									</div>
								</div> 
								<div style="min-height:1px">&nbsp;</div> 
								
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								
								<?php else: ?>
								
								<?php endif; ?>

								
								
								
								
								
								
                            </div>
                        </div>


<?php else: ?>
	
<?php endif; ?>



		
		
		
    </div><?php /**PATH /home/deepredink/public_html/demos/nps/v1/resources/views/admin/dashboard/split_nps_count.blade.php ENDPATH**/ ?>