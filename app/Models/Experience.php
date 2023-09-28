<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function Bookings(): BelongsToMany
    {
        return $this->belongsToMany(Booking::class);
    }
}
