<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'experience_id',
        'booking_number',
    ];
}
