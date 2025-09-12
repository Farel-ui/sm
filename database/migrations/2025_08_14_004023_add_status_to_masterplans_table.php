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
        Schema::table('masterplans', function (Blueprint $table) {
            if (!Schema::hasColumn('masterplans', 'type')) {
                $table->enum('type', ['buku', 'paparan'])->after('period');
            }
            if (!Schema::hasColumn('masterplans', 'status')) {
                $table->enum('status', ['publish', 'draft'])->after('type');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('masterplans', function (Blueprint $table) {
            $table->dropColumn(['type', 'status']);
        });
    }
};
