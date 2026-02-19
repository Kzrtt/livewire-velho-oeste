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
        Schema::create('gangs', function (Blueprint $table) {
            $table->id('gng_id');
            $table->string('gng_name');
            $table->string('gng_territory');
            $table->tinyInteger('gng_reputation')->default(1);
            $table->boolean('gng_active')->default(true);
            $table->timestamp('gng_created_at')->nullable();
            $table->timestamp('gng_updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gangs');
    }
};
