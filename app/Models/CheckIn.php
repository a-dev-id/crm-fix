<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_number',
        'check_in_status',
        'pre_arrival_status',
        'check_out_status',
    ];
}
