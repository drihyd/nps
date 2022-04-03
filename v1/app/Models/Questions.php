<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ActiveOrgaization;

class Questions extends Model
{
    use HasFactory;
	
	protected $table ="questions";
	
	protected static function boot()
    {
        parent::boot();  
        static::addGlobalScope(new ActiveOrgaization('questions'));
    }
	
}
