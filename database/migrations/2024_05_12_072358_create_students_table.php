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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // If not using Laravel's built-in authentication
            $table->string('name');
            $table->string('roll_number');
            $table->string('class');
            // Add other student information fields as needed
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // If using Laravel's built-in authentication
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
