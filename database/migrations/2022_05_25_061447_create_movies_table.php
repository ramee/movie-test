<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movies', static function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('director');
            $table->string('description');
            $table->string('photo_url');
            $table->year('year');
            $table->string('provider')->nullable();
            $table->string('providerId')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
