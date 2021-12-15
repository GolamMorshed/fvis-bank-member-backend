<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FDR extends Model
{
    use HasFactory;
    protected $table = 'fdr_plans';
    protected $fillable = [
        'name',
        'minimum_amount',
        'maximum_amount',
        'first_payment_date',
        'interest_rate',
        'duration',
        'duration_type',
        'status',
        'description',
        'created_at',
        'updated_at',
    ];
}
