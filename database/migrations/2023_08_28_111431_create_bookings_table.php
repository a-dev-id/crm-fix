<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('guest_id')->nullable();
            $table->string('booking_number')->nullable();
            $table->string('arrival')->nullable();
            $table->string('departure')->nullable();
            $table->string('villa_id')->nullable();
            $table->string('adult')->nullable();
            $table->string('child')->nullable();
            $table->string('purpose_stay')->nullable();
            $table->string('total_charge')->nullable();
            $table->string('campaign_name')->nullable();
            $table->longText('campaign_benefit')->nullable();
            $table->longText('remarks')->nullable();
            $table->string('confirmation_letter_status')->nullable();
            $table->string('check_in_status')->nullable();
            $table->string('pre_arrival_status')->nullable();
            $table->string('token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
