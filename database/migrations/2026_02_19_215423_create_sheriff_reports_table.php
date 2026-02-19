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
        Schema::create('sheriff_reports', function (Blueprint $table) {
            $table->id('shr_id');
            $table->foreignId('shr_outlaw_id')->nullable()->constrained('outlaws', 'otl_id')->nullOnDelete();
            $table->foreignId('shr_hunter_id')->nullable()->constrained('bounty_hunters', 'bht_id')->nullOnDelete();
            $table->string('shr_title');
            $table->text('shr_description');
            $table->enum('shr_type', ['sighting', 'capture', 'escape', 'incident', 'patrol']);
            $table->string('shr_location');
            $table->boolean('shr_resolved')->default(false);
            $table->dateTime('shr_reported_at');
            $table->timestamp('shr_created_at')->nullable();
            $table->timestamp('shr_updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sheriff_reports');
    }
};
