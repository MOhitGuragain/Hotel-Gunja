<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking_menu_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('booking_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('menu_item_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->integer('quantity')->default(1);

            // store price at time of order (VERY IMPORTANT)
            $table->decimal('price_at_time', 10, 2);

            $table->enum('order_status', ['pending', 'preparing', 'served', 'cancelled'])
                  ->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_menu_items');
    }
};
