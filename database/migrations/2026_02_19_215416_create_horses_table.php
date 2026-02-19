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
        Schema::create('horses', function (Blueprint $table) {
            $table->id('hrs_id');
            $table->foreignId('hrs_outlaw_id')->nullable()->constrained('outlaws', 'otl_id')->nullOnDelete();
            $table->string('hrs_name');
            $table->string('hrs_breed');
            $table->string('hrs_color');
            $table->tinyInteger('hrs_speed')->default(5);
            $table->boolean('hrs_stolen')->default(false);
            $table->timestamp('hrs_created_at')->nullable();
            $table->timestamp('hrs_updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horses');
    }
};
