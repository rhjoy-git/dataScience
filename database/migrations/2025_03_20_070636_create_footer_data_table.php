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
        Schema::create('footer_data', function (Blueprint $table) {
            $table->id();
            $table->json('courses')->nullable(); 
            $table->json('resources')->nullable(); 
            $table->json('legal')->nullable();
            $table->json('contact')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_data');
    }
};
