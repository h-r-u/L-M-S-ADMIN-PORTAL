<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $connection = 'payment_database';
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'order_id',
        'quantity',
        'product',
        'amount',
    ];
}
