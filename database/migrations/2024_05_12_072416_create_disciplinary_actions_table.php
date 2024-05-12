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
        Schema::create('disciplinary_actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('violation_id');
            $table->string('action_type');
            $table->date('action_date');
            $table->text('description')->nullable();
            // Add other disciplinary action fields as needed
            $table->timestamps();
        
            $table->foreign('violation_id')->references('id')->on('violations')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disciplinary_actions');
    }
};
