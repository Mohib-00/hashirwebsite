<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('job_applies', function (Blueprint $table) {
        $table->id();
        $table->string('cv')->nullable();  
        $table->string('name');
        $table->string('email');
        $table->string('phone')->nullable();
        $table->text('message')->nullable();
        $table->text('job_title');
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('job_applies');
    }
};
