<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role_user_model extends Model
{
    use HasFactory;
    protected $table='role_user';
    protected $primaryKey='id';
    protected $fillable=[
        'user_id',
        'role_id',
        'created_at',
        'updated_at',
    ];
}
