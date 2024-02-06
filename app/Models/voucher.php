<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voucher extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'voucher_id',
        'student_name',
        'class',
        'section',
        'sid',
        'father_name',
        'voucher_type',
        'voucher_number' => 'default_value',
        'amount', // This matches the actual data type 'VARCHAR(255)' in your database
        'expiry_date',
        'date_issued',
        'status',
        // Add other fields as needed
    ];
}
