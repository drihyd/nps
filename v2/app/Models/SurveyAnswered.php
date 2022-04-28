<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ActiveOrgaization;


class SurveyAnswered extends Model
{
    use HasFactory;
	protected $table = 'survey_answered';
	public $timestamps = true;
	

protected static function boot()
{
parent::boot();  
static::addGlobalScope(new ActiveOrgaization('survey_answered'));
}
	
}
