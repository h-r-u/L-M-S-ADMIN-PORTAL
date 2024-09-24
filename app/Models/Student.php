<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $connection = 'student_database';
    protected $table = 'students';
    protected $fillable = [
        'full_name',
        'admission_number',
        'passport_photo',
        'email',
        'phone_number',
        'course',
        'intake',
        'level',
        'exam_location',
        'status',
    ];
}
