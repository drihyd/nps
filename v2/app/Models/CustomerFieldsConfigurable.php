<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ActiveOrgaization;

class CustomerFieldsConfigurable extends Model
{
    use HasFactory;
    protected $table = 'customer_fields_configurables';
    protected static function boot()
    {
        parent::boot();  
        static::addGlobalScope(new ActiveOrgaization('customer_fields_configurables'));
    }
}
