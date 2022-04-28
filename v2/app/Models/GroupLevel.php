<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ActiveOrgaization;

class GroupLevel extends Model
{
    use HasFactory;
    protected $table ="group_levels";  
    protected static function boot()
    {
        parent::boot();  
        static::addGlobalScope(new ActiveOrgaization('group_levels'));
    }
}
