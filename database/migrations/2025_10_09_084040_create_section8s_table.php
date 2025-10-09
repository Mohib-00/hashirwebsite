<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('section8', function (Blueprint $table) {
            $table->id();
            $table->text('main_paragraph')->nullable();
            $table->text('image')->nullable();
            $table->text('heading')->nullable();
            $table->text('paragraph')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('section8');
    }
};
