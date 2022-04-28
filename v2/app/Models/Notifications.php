<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ActiveOrgaization;

class Notifications extends Model
{
    use HasFactory;
	protected $table ="notifications";
	protected static function boot()
    {
        parent::boot();  
        static::addGlobalScope(new ActiveOrgaization('notifications'));
    }
}
