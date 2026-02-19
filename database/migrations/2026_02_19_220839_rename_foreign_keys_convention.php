<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Rename FK columns from {prefix}_{ref_table}_id to {ref_table}_{ref_prefix}_id
 *
 * Examples:
 *   otl_gang_id    → gang_gng_id
 *   hrs_outlaw_id  → outlaw_otl_id
 *   sor_outlaw_id  → outlaw_otl_id
 *   sor_drink_id   → saloon_drink_sdk_id
 *   shr_outlaw_id  → outlaw_otl_id
 *   shr_hunter_id  → bounty_hunter_bht_id
 *   tev_outlaw_id  → outlaw_otl_id
 */
return new class extends Migration
{
    public function up(): void
    {
        // outlaws: otl_gang_id → gang_gng_id
        Schema::table('outlaws', function (Blueprint $table) {
            $table->dropForeign(['otl_gang_id']);
            $table->renameColumn('otl_gang_id', 'gang_gng_id');
        });
        Schema::table('outlaws', function (Blueprint $table) {
            $table->foreign('gang_gng_id')->references('gng_id')->on('gangs')->nullOnDelete();
        });

        // horses: hrs_outlaw_id → outlaw_otl_id
        Schema::table('horses', function (Blueprint $table) {
            $table->dropForeign(['hrs_outlaw_id']);
            $table->renameColumn('hrs_outlaw_id', 'outlaw_otl_id');
        });
        Schema::table('horses', function (Blueprint $table) {
            $table->foreign('outlaw_otl_id')->references('otl_id')->on('outlaws')->nullOnDelete();
        });

        // saloon_orders: sor_outlaw_id → outlaw_otl_id, sor_drink_id → saloon_drink_sdk_id
        Schema::table('saloon_orders', function (Blueprint $table) {
            $table->dropForeign(['sor_outlaw_id']);
            $table->dropForeign(['sor_drink_id']);
            $table->renameColumn('sor_outlaw_id', 'outlaw_otl_id');
            $table->renameColumn('sor_drink_id', 'saloon_drink_sdk_id');
        });
        Schema::table('saloon_orders', function (Blueprint $table) {
            $table->foreign('outlaw_otl_id')->references('otl_id')->on('outlaws')->nullOnDelete();
            $table->foreign('saloon_drink_sdk_id')->references('sdk_id')->on('saloon_drinks')->cascadeOnDelete();
        });

        // sheriff_reports: shr_outlaw_id → outlaw_otl_id, shr_hunter_id → bounty_hunter_bht_id
        Schema::table('sheriff_reports', function (Blueprint $table) {
            $table->dropForeign(['shr_outlaw_id']);
            $table->dropForeign(['shr_hunter_id']);
            $table->renameColumn('shr_outlaw_id', 'outlaw_otl_id');
            $table->renameColumn('shr_hunter_id', 'bounty_hunter_bht_id');
        });
        Schema::table('sheriff_reports', function (Blueprint $table) {
            $table->foreign('outlaw_otl_id')->references('otl_id')->on('outlaws')->nullOnDelete();
            $table->foreign('bounty_hunter_bht_id')->references('bht_id')->on('bounty_hunters')->nullOnDelete();
        });

        // town_events: tev_outlaw_id → outlaw_otl_id
        Schema::table('town_events', function (Blueprint $table) {
            $table->dropForeign(['tev_outlaw_id']);
            $table->renameColumn('tev_outlaw_id', 'outlaw_otl_id');
        });
        Schema::table('town_events', function (Blueprint $table) {
            $table->foreign('outlaw_otl_id')->references('otl_id')->on('outlaws')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('town_events', function (Blueprint $table) {
            $table->dropForeign(['outlaw_otl_id']);
            $table->renameColumn('outlaw_otl_id', 'tev_outlaw_id');
        });
        Schema::table('town_events', function (Blueprint $table) {
            $table->foreign('tev_outlaw_id')->references('otl_id')->on('outlaws')->nullOnDelete();
        });

        Schema::table('sheriff_reports', function (Blueprint $table) {
            $table->dropForeign(['outlaw_otl_id']);
            $table->dropForeign(['bounty_hunter_bht_id']);
            $table->renameColumn('outlaw_otl_id', 'shr_outlaw_id');
            $table->renameColumn('bounty_hunter_bht_id', 'shr_hunter_id');
        });
        Schema::table('sheriff_reports', function (Blueprint $table) {
            $table->foreign('shr_outlaw_id')->references('otl_id')->on('outlaws')->nullOnDelete();
            $table->foreign('shr_hunter_id')->references('bht_id')->on('bounty_hunters')->nullOnDelete();
        });

        Schema::table('saloon_orders', function (Blueprint $table) {
            $table->dropForeign(['outlaw_otl_id']);
            $table->dropForeign(['saloon_drink_sdk_id']);
            $table->renameColumn('outlaw_otl_id', 'sor_outlaw_id');
            $table->renameColumn('saloon_drink_sdk_id', 'sor_drink_id');
        });
        Schema::table('saloon_orders', function (Blueprint $table) {
            $table->foreign('sor_outlaw_id')->references('otl_id')->on('outlaws')->nullOnDelete();
            $table->foreign('sor_drink_id')->references('sdk_id')->on('saloon_drinks')->cascadeOnDelete();
        });

        Schema::table('horses', function (Blueprint $table) {
            $table->dropForeign(['outlaw_otl_id']);
            $table->renameColumn('outlaw_otl_id', 'hrs_outlaw_id');
        });
        Schema::table('horses', function (Blueprint $table) {
            $table->foreign('hrs_outlaw_id')->references('otl_id')->on('outlaws')->nullOnDelete();
        });

        Schema::table('outlaws', function (Blueprint $table) {
            $table->dropForeign(['gang_gng_id']);
            $table->renameColumn('gang_gng_id', 'otl_gang_id');
        });
        Schema::table('outlaws', function (Blueprint $table) {
            $table->foreign('otl_gang_id')->references('gng_id')->on('gangs')->nullOnDelete();
        });
    }
};
