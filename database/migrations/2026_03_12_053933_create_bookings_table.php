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
            $table->integer('total_price'); // Nominal yang harus dibayar saat ini (misal 50% nya)

            // Tambahkan kolom ini
            $table->enum('payment_type', ['full', 'dp'])->default('full');

            // Sesuaikan enum status dengan yang kamu buat tadi
            $table->enum('status', ['pending', 'paid', 'dp50%', 'cancelled', 'draft'])->default('draft');

            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('midtrans_order_id')->nullable();
            $table->string('snap_token')->nullable();

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
