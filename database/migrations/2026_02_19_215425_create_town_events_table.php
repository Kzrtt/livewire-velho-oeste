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
        Schema::create('town_events', function (Blueprint $table) {
            $table->id('tev_id');
            $table->foreignId('tev_outlaw_id')->nullable()->constrained('outlaws', 'otl_id')->nullOnDelete();
            $table->string('tev_title');
            $table->text('tev_description');
            $table->enum('tev_type', ['robbery', 'duel', 'arrival', 'party', 'escape']);
            $table->string('tev_location');
            $table->enum('tev_severity', ['low', 'medium', 'high', 'critical']);
            $table->boolean('tev_resolved')->default(false);
            $table->dateTime('tev_happened_at');
            $table->timestamp('tev_created_at')->nullable();
            $table->timestamp('tev_updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('town_events');
    }
};
