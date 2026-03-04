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
        Schema::create('daftar_trip', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('image');
            $table->string('title');
            $table->integer('price');
            $table->integer('quota');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_trip');
    }
};
