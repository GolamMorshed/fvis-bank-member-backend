<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendMoney extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
        'id',
        'user_id',
        'currency_id',
        'amount',
        'fee',
        'dr_cr',
        'type',
        'method',
        'status',
        'note',
        'loan_id',
        'ref_id',
        'parent_id',
        'other_bank_id',
        'gateway_id',
        'created_user_id',
        'updated_user_id',
        'branch_id',
        'transaction_details',
        'created_at',
        'updated_at'
    ];
}
