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
        Schema::create('outlaws', function (Blueprint $table) {
            $table->id('otl_id');
            $table->foreignId('otl_gang_id')->nullable()->constrained('gangs', 'gng_id')->nullOnDelete();
            $table->string('otl_name');
            $table->string('otl_alias');
            $table->decimal('otl_bounty', 10, 2)->default(0);
            $table->string('otl_crime');
            $table->enum('otl_status', ['wanted', 'captured', 'escaped'])->default('wanted');
            $table->tinyInteger('otl_danger_level')->default(1);
            $table->dateTime('otl_last_seen_at')->nullable();
            $table->timestamp('otl_created_at')->nullable();
            $table->timestamp('otl_updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outlaws');
    }
};
