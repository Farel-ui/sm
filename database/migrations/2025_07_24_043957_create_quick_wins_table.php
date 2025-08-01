<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuickWinsTable extends Migration
{
    public function up()
    {
        Schema::create('quick_wins', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image'); // path ke gambar
            $table->text('description')->nullable(); // deskripsi tambahan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quick_wins');
    }
}
