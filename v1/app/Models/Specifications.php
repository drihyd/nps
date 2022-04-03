<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ActiveOrgaization;

class Specifications extends Model
{
    use HasFactory;
	protected $table ="specifications";
	
	protected static function boot()
    {
        parent::boot();  
        static::addGlobalScope(new ActiveOrgaization('specifications'));
    }
	
}
