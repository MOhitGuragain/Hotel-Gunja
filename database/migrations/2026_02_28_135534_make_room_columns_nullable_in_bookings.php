<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('room_category_id')->nullable()->change();
            $table->unsignedBigInteger('room_plan_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('room_category_id')->nullable(false)->change();
            $table->unsignedBigInteger('room_plan_id')->nullable(false)->change();
        });
    }
};