<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ActiveOrgaization;
class Departments_Users extends Model
{
    use HasFactory;
	protected $table ="mapping_depatemnts_to_users";
}