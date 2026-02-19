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
        Schema::create('saloon_orders', function (Blueprint $table) {
            $table->id('sor_id');
            $table->foreignId('sor_outlaw_id')->nullable()->constrained('outlaws', 'otl_id')->nullOnDelete();
            $table->foreignId('sor_drink_id')->constrained('saloon_drinks', 'sdk_id')->cascadeOnDelete();
            $table->string('sor_customer_name')->nullable();
            $table->integer('sor_quantity')->default(1);
            $table->decimal('sor_total_price', 8, 2);
            $table->enum('sor_status', ['pending', 'preparing', 'served', 'paid'])->default('pending');
            $table->text('sor_notes')->nullable();
            $table->timestamp('sor_created_at')->nullable();
            $table->timestamp('sor_updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saloon_orders');
    }
};
