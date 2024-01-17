<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inactivestudent extends Model
{
   // In your InactiveStudent model
protected $fillable = ['sid', 'student_name', 'class', 'section', 'father_name', 'mobile_number', 'status'];

    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }
    // You may need to set timestamps to false if your table doesn't have created_at and updated_at columns
    public $timestamps = false;
}
