<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->text('description')->change();
            $table->renameColumn('providerId', 'provider_id');
        });
    }

    public function down(): void
    {
    }
};
