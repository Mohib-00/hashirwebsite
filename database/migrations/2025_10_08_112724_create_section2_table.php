<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('section2', function (Blueprint $table) {
        $table->id();
        $table->string('image')->nullable(); 
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('section2');
    }
};
