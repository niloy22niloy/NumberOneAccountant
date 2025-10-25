<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->text('title'); // supports HTML (for colored text)
            $table->string('subtitle');
            $table->text('description');
            $table->string('button1_text');
            $table->string('button1_link');
            $table->string('button2_text');
            $table->string('button2_link');
            $table->string('video');
            // $table->string('background_color')->nullable()->default('#ffffff');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
