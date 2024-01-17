<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addstudent extends Model
{
    protected $fillable = [
        'student_name',
        'class',
        'section',
        'father_name',
        'mobile_number',
        'status',
    ];
}
