<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDimensionsTable extends Migration
{
    public function up()
    {
        Schema::create('dimensions', function (Blueprint $table) {
            $table->id();
            $table->string('name');              // Nama dimensi
            $table->text('description');         // Deskripsi
            $table->string('image');             // Path ke gambar (icon)
            $table->string('video')->nullable(); // Path ke video (opsional)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dimensions');
    }
}
