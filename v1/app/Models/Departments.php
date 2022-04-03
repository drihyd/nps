<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ActiveOrgaization;

class Departments extends Model
{
    use HasFactory;
	
	protected $table ="departments";

	
	protected static function boot()
    {
		
	
        parent::boot();  
        static::addGlobalScope(new ActiveOrgaization('departments'));
    }
	
	
	
	
}
