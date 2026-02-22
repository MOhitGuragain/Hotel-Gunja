<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_halls', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->integer('min_capacity');
    $table->integer('max_capacity');
    $table->decimal('price_per_hour', 10, 2);
    $table->enum('status', ['available', 'booked'])->default('available');
    $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('event_halls');
    }
};
