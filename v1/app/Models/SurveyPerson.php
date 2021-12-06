<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyPerson extends Model
{
    use HasFactory;
	protected $table = 'survey_persons';
	public $timestamps = true;
	
	protected $fillable = array('firstname', 'email', 'mobile', 'organization_id', 'survey_id','logged_user_id');
}
