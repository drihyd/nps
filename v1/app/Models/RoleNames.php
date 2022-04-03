<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ActiveOrgaization;

class RoleNames extends Model
{
    use HasFactory;
    protected $table ="role_names";  
    protected static function boot()
    {
        parent::boot();  
        static::addGlobalScope(new ActiveOrgaization('role_names'));
    }
}
