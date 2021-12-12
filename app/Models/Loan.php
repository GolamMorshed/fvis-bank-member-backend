<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $table = 'loans';
    protected $fillable = [
        'loan_Id',
        'loan_product_Id',
        'borrower_Id',
        'first_payment_date',
        'release_date',
        'currency_Id',
        'applied_amount',
        'total_payable',
        'total_paid',
        'late_payment_penalties',
        'attachment',
        'description',
        'remarks',
        'status',
        'approved_date',
        'approved_user_Id',
        'created_user_Id',
        'branch_Id'
    ];
}
