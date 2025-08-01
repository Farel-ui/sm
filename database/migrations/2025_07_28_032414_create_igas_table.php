<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIgasTable extends Migration
{
    public function up(): void
    {
        Schema::create('igas', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->string('institution', 100);
            $table->string('image', 255); // URL atau path gambar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('igas');
    }
}
