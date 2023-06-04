<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('website_housekeeping_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('permission')->unique();
            $table->string('description')->nullable();
            $table->unsignedInteger('min_rank');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('website_housekeeping_permissions');
    }
};
