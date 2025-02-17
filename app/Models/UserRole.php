<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UserRole extends Model
{
    use HasFactory;
    protected $table='user_roles';
    protected $primaryKey='id';
    protected $fillable=[
        'name'
    ];
    //1 role belongs to many users
    public function belongstoManyUsers():BelongsToMany
    {
       return $this->belongsToMany(User::class,'role_user','role_id','user_id');
    }
}
