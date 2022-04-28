<?php
namespace App\Scopes;
  
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Session;
use DB;

  
  
  
  
class ActiveOrgaization implements Scope
{
	
	 public function __construct($table=false)
    {

	   $this->active_table=$table??'';
    }
	
	
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
		
		$company=DB::table('organizations')->select('id')->where('id',\Session::get('companyID')??0)->first();
		
		if(isset($company)){
		$company=$company;

		}
		else{

		$company=DB::table('organizations')->select('id')->where('id',\Session::get('companyID')??0)->first();

		if(isset($company)){
		$company=$company;
		}
		else{
	
		}		
		}

		if($this->active_table=="departments"){
			if(isset($company->id)) {
				$builder->where('departments.organization_id', '=', $company->id??0);
			}
		}
		
		else if($this->active_table=="activities"){
			if(isset($company->id)) {
				$builder->where('activities.organization_id', '=', $company->id??0);
			}
		}		
		
		else if($this->active_table=="specifications"){
			if(isset($company->id)) {
			$builder->where('specifications.organization_id', '=', $company->id??0);
			}
		}
		
		else if($this->active_table=="doctors"){
			if(isset($company->id)) {
			$builder->where('doctors.organization_id', '=', $company->id??0);
			}
		}
		
		else if($this->active_table=="wards"){
			if(isset($company->id)) {
			$builder->where('wards.organization_id', '=', $company->id??0);
			}
		}
		
		else if($this->active_table=="notifications"){
			if(isset($company->id)) {
			$builder->where('notifications.organization_id', '=', $company->id??0);
			}
		}
		else if($this->active_table=="processes"){
			if(isset($company->id)) {
			$builder->where('processes.organization_id', '=', $company->id??0);
			}
		}
		else if($this->active_table=="surveys"){
			if(isset($company->id)) {
			$builder->where('surveys.organization_id', '=', $company->id??0);
			}
		}
		else if($this->active_table=="organizations"){
			if(isset($company->id)) {
			$builder->where('organizations.id', '=', $company->id??0);
			}
		}
		else if($this->active_table=="questions"){
			if(isset($company->id)) {
			$builder->where('questions.organization_id', '=', $company->id??0);
			}
		}
		
		else if($this->active_table=="users"){
			
			if(isset($company->id)) {
				$builder->where('users.organization_id', '=', $company->id??0);
			}
		}
		else if($this->active_table=="survey_answered"){
			
			if(isset($company->id)) {
				$builder->where('survey_answered.organization_id', '=', $company->id??0);
			}
		}
		else if($this->active_table=="survey_persons"){
			
			if(isset($company->id)) {
				$builder->where('survey_persons.organization_id', '=', $company->id??0);
			}
		}
		else if($this->active_table=="group_levels"){
			
			if(isset($company->id)) {
				$builder->where('group_levels.organization_id', '=', $company->id??0);
			}
		}
		else if($this->active_table=="role_levels"){
			
			if(isset($company->id)) {
				$builder->where('role_levels.organization_id', '=', $company->id??0);
			}
		}
		else if($this->active_table=="role_names"){
			
			if(isset($company->id)) {
				$builder->where('role_names.organization_id', '=', $company->id??0);
			}
		}
		else if($this->active_table=="question_options"){
			
			if(isset($company->id)) {
				$builder->where('question_options.organization_id', '=', $company->id??0);
			}
		}
		else if($this->active_table=="customer_fields_configurables"){
			
			if(isset($company->id)) {
				$builder->where('customer_fields_configurables.organization_id', '=', $company->id??0);
			}
		}
		else if($this->active_table=="rating_of_departments"){
			
			if(isset($company->id)) {
				$builder->where('rating_of_departments.organization_id', '=', $company->id??0);
			}
		}
		else if($this->active_table=="rating_of_dep_activities"){
			
			if(isset($company->id)) {
				$builder->where('rating_of_dep_activities.organization_id', '=', $company->id??0);
			}
		}
		else if($this->active_table=="sla_configurations"){
			
			if(isset($company->id)) {
				$builder->where('sla_configurations.organization_id', '=', $company->id??0);
			}
		}
    }
}
