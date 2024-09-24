<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $connection = 'course_database';
    protected $table = 'courses';
    protected $fillable = [
        'name',
        'cover_photo',
        'duration',
        'level',
        'price',
        'status',
    ];
}