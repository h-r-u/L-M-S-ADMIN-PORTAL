<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $connection = 'payment_database';
    protected $primaryKey = 'email';
    protected $fillable = [
        'order_id',
        'email',
        'course',
        'level',
        'intake',
        'status',
    ];
}
