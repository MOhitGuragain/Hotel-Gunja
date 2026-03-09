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
        Schema::create('gallery_images', function (Blueprint $table) {
            $table->id();
             $table->string('image_path');
            $table->string('title')->nullable();

            $table->enum('category', [
                'interior',
                'exterior',
                'bedroom',
                'restaurant',
                'bar',
                'hall',
                'guest'
            ]);

            $table->boolean('is_approved')->default(false);
            $table->boolean('show_on_homepage')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_images');
    }
};
