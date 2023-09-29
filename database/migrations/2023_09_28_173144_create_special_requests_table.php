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
        Schema::create('special_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_number')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('price')->nullable();
            $table->string('note')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->nullable();
            $table->integer('approve')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('special_requests');
    }
};
