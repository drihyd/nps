<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ActiveOrgaization;


class SurveyPerson extends Model
{
    use HasFactory;
	protected $table = 'survey_persons';
	public $timestamps = true;
	
	protected $fillable = array(
	'firstname', 
	'email',
	'mobile',
	'gender', 
	'organization_id',
	'survey_id',
	'logged_user_id',
	'ticket_series_number',
	'ticker_final_number',
	'bed_name',
	'uhid',
	'discharge_date',
	'feedback_date',
	'ward_id',
	'doctor_id',
	'inpatient_id',
	'feedback_was_givenby',
	'know_about_hospital',
	'patient_attender_name',
	'rating',
	'assigned_ticket',
	'transferred_ticket',
	
	);
	
protected static function boot()
{
parent::boot();  
static::addGlobalScope(new ActiveOrgaization('survey_persons'));
}
	

	
}
