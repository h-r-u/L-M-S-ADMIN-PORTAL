<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowOrder extends Model
{
    use HasFactory;
    protected $connection = 'payment_database';
    protected $table = 'orders';
}
