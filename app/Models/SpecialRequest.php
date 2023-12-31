<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_number',
        'title',
        'description',
        'price',
        'note',
        'image',
        'status',
        'approve',
    ];
}
