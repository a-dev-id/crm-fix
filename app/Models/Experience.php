<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'note',
        'button_label',
        'button_link',
        'image',
        'order',
        'status',
    ];
}
