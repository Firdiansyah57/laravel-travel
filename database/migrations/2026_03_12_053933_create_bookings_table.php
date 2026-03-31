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
    $table->foreignId('trip_schedule_id')->constrained()->cascadeOnDelete();

    $table->string('name');
    $table->string('email');
    $table->string('phone');

    $table->integer('qty');
    $table->integer('total_price');

    $table->enum('status',['pending','paid','cancelled'])->default('pending');

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
