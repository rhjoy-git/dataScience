<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('curriculums', function (Blueprint $table) {  
            $table->id();  
            $table->string('section_title'); 
            $table->string('week');          
            $table->text('title')->nullable();           
            $table->string('instructor');   
            $table->string('profile_image')->nullable(); 
            $table->json('lessons');         
            $table->timestamps();           
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriculums');
    }
};
