<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ActiveOrgaization;
class SlaConfiguration extends Model
{
    use HasFactory;
	 protected $table ="sla_configurations";  
    protected static function boot()
    {
        parent::boot();  
        static::addGlobalScope(new ActiveOrgaization('sla_configurations'));
    }
}
