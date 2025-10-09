<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('section6', function (Blueprint $table) {
            $table->id();
            $table->text('heading')->nullable();
            $table->text('paragraph')->nullable();
            $table->text('points_headings')->nullable();
            $table->text('point')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('section6');
    }
};
