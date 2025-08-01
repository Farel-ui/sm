<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->string('year')->unique(); // gunakan string jika tahun bisa fleksibel, atau integer jika pasti numerik
            $table->decimal('score', 4, 2);   // contoh: 3.57
            $table->string('color');          // warna batang grafik
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
