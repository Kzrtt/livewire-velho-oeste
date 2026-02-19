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
        Schema::create('bounty_hunters', function (Blueprint $table) {
            $table->id('bht_id');
            $table->string('bht_name');
            $table->string('bht_alias')->nullable();
            $table->decimal('bht_success_rate', 5, 2)->default(0);
            $table->integer('bht_captures')->default(0);
            $table->boolean('bht_active')->default(true);
            $table->timestamp('bht_created_at')->nullable();
            $table->timestamp('bht_updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bounty_hunters');
    }
};
