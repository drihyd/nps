<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ActiveOrgaization;


class RatingOfDepartment extends Model
{
    use HasFactory;
	protected $table ="rating_of_departments";
	
	protected static function boot()
    {
        parent::boot();  
        static::addGlobalScope(new ActiveOrgaization('rating_of_departments'));
    }
}
