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
        Schema::create('detial_service_section2s', function (Blueprint $table) {
            $table->id();
            $table->text('heading')->nullable();
            $table->text('paragraph')->nullable();
            $table->text('points_headings')->nullable();
            $table->text('point')->nullable();
            $table->text('image')->nullable();
            $table->text('slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detial_service_section2s');
    }
};
