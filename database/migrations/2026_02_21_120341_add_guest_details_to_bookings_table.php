<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('guest_name')->after('guest_id');
            $table->string('contact_number')->after('guest_name');
            $table->string('id_image')->nullable()->after('contact_number');
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn([
                'guest_name',
                'contact_number',
                'id_image'
            ]);
        });
    }
};