<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_id',
        'booking_number',
        'arrival',
        'departure',
        'villa_id',
        'adult',
        'child',
        'total_charge',
        'campaign_name',
        'campaign_benefit',
        'remarks',
        'status',
    ];
}
