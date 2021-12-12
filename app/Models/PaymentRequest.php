<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentRequest extends Model
{
    use HasFactory;
    protected $table = 'payment_requests';
    protected $fillable = [
        'currency_id',
        'amount',
        'status',
        'description',
        'sender_id',
        'receiver_id',
        'transaction_id',
        'branch_id',
        'created_at',
        'updated_at'
    ];
}
