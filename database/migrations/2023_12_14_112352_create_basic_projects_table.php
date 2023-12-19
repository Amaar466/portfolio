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
        Schema::create('basic_projects', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->string('title');
            $table->string('subtitle');
            $table->text('pictures');
            $table->string('featured', 100)->nullable();
            $table->string('slug', 50);
            $table->string('link', 200);
            $table->text('shortDescription');
            $table->string('category', 20);
            $table->string('youtube_link', 12)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basic_projects');
    }
};
