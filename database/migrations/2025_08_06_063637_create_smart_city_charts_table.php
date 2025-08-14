<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('smart_city_charts', function (Blueprint $table) {
        $table->id();
        $table->integer('tahun'); // Tambah kolom tahun
        $table->decimal('nilai', 5, 2); // Tambah kolom nilai, misalnya nilai 99.25
        $table->timestamps(); // created_at dan updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smart_city_charts');
    }
};
