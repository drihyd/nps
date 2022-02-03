<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyAnswered extends Model
{
    use HasFactory;
	protected $table = 'survey_answered';
	public $timestamps = true;
}
