<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedDeposit extends Model
{
    use HasFactory;
    protected $table = 'fdrs';
    protected $fillable = [
        'fdr_plan_Id',
        'user_Id',
        'currency_Id',
        'deposit_amount',
        'return_amount',
        'attachment',
        'remarks',
        'status',
        'approved_date',
        'mature_date',
        'transaction_Id',
        'approved_user_Id',
        'created_user_Id',
        'updated_user_Id',
        'branch_Id'
    ];
}
