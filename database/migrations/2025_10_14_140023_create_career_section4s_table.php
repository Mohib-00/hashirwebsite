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
        Schema::create('career_section4s', function (Blueprint $table) {
            $table->id();
            $table->text('image')->nullable();
            $table->text('heading')->nullable();
            $table->text('paragraph')->nullable();
            $table->text('links')->nullable();
            $table->text('main_heading')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_section4s');
    }
};
