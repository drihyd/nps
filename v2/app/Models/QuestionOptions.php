<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ActiveOrgaization;

class QuestionOptions extends Model
{
	use HasFactory;
	protected $table = 'question_options';
	public $timestamps = true;
	protected static function boot()
    {
        parent::boot();  
        static::addGlobalScope(new ActiveOrgaization('question_options'));
    }
}
