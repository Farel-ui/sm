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
        Schema::create('evaluasis', function (Blueprint $table) {
    $table->id();
    $table->year('tahun');
    $table->float('baseline')->nullable();
    $table->float('output')->nullable();
    $table->float('outcome')->nullable();
    $table->float('impact')->nullable();
    $table->float('quick_wins')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasis');
    }
};
