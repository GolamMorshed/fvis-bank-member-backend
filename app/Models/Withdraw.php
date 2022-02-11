<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;
    protected $table = 'withdraw';
    protected $fillable = [
        'id',
        'user_id',
        'bank_name',
        'branch_name',
        'swift_code',
        'account_holder_name',
        'account_no',
        'account_holder_phone_no',
        'currency',
        'amount',
        'approved',
        'created_at',
        'updated_at'
    ];
}
