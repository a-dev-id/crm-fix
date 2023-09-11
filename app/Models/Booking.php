<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'purpose_stay',
        'total_charge',
        'campaign_name',
        'campaign_benefit',
        'remarks',
        'status',
        'token',
    ];

    /**
     * Get the user that owns the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guest(): BelongsTo
    {
        return $this->belongsTo(Guest::class, 'guest_id', 'id');
    }

    /**
     * Get the user that owns the Booking
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function villa(): BelongsTo
    {
        return $this->belongsTo(Villa::class, 'villa_id', 'id');
    }
}
