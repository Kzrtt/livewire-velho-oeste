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
        Schema::create('saloon_drinks', function (Blueprint $table) {
            $table->id('sdk_id');
            $table->string('sdk_name');
            $table->enum('sdk_type', ['whiskey', 'beer', 'wine', 'coffee', 'other']);
            $table->decimal('sdk_price', 8, 2);
            $table->boolean('sdk_alcoholic')->default(true);
            $table->boolean('sdk_available')->default(true);
            $table->timestamp('sdk_created_at')->nullable();
            $table->timestamp('sdk_updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saloon_drinks');
    }
};
