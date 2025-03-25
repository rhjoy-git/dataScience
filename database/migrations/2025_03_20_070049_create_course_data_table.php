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
        Schema::create('course_data', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->boolean('enrollment_open')->nullable();
            $table->string('enrollment_url')->nullable();
            $table->string('enrollment_text')->nullable();
            $table->string('organization_name')->nullable();
            $table->string('organization_url')->nullable();
            $table->string('organization_logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_data');
    }
};
