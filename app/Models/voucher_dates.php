<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voucher_dates extends Model
{
    protected $fillable = [
        'single_student_voucher_id', 'bulk_student_voucher_id', 'charge_date','posting_date'
    ];
    use HasFactory;
}
