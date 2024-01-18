<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_fee extends Model
{
    protected $fillable = [
        'feetype', 'tutionfee', 'labfee','examinationfee','status','session' // Add other fields as needed
    ];
    use HasFactory;
}
