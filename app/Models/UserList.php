<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'user_type',
        'role_id',
        'branch_id',
        'status',
        'profile_picture',
        'email_verified_at',
        'sms_verified_at',
        'password',
        'provider',
        'provider_id',
        'country_code',
        'remember_token',
        'created_at',
        'updated_at'
    ];
}
