<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->string('award_title')->nullable()->after('color');   // Judul penghargaan
            $table->string('award_image')->nullable()->after('award_title'); // Gambar penghargaan (nama file)
        });
    }

    public function down(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->dropColumn(['award_title', 'award_image']);
        });
    }
};
