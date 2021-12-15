<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedDeposit extends Model
{
    use HasFactory;
    protected $table = 'fdrs';
    protected $fillable = [
        'fdr_plan_id',
        'user_id',
        'currency_id',
        'deposit_amount',
        'return_amount',
        'attachment',
        'remarks',
        'status',
        'approved_date',
        'mature_date',
        'transaction_id',
        'approved_user_id',
        'created_user_id',
        'updated_user_id',
        'branch_id'
    ];
}
