<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('image')->nullable();
            $table->text('number')->nullable();
            $table->text('email')->nullable();
            $table->text('section5_heading')->nullable();
            $table->text('section6_heading')->nullable();
            $table->text('section8_heading')->nullable();
            $table->text('section8_paragraph')->nullable();
            $table->text('section9_heading')->nullable();
            $table->text('section10_heading')->nullable();
            $table->text('section11_heading')->nullable();
            $table->text('footer_paragraph')->nullable();
            $table->text('location')->nullable();
            $table->text('facebook_link')->nullable();
            $table->text('instagram_link')->nullable();
            $table->text('linkedin_link')->nullable();
            $table->text('youtube_link')->nullable();
            $table->text('twitter_link')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
