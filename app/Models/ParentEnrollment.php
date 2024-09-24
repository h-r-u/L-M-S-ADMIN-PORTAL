<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentEnrollment extends Model
{
    use HasFactory;
    protected $connection = 'enrollment_database';
    protected $table = 'enrollments';
}