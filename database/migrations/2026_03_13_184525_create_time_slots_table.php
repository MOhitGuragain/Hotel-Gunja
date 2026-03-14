<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('time_slots', function (Blueprint $table) {

            $table->id();

            // which restaurant this slot belongs to
            $table->foreignId('restaurant_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // slot start
            $table->time('start_time');

            // slot end
            $table->time('end_time');

            // optional duration in minutes
            $table->integer('duration')->default(90);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('time_slots');
    }
};