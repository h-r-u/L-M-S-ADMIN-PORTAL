<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $connection = 'payment_database';
    protected $fillable = [
        'email',
        'phone',
        'amount',
        'order_id',
        'invoice_id',
        'transaction_type',
        'transaction_id',
        'transaction_code',
        'transaction_status',
        'status',
    ];
}
