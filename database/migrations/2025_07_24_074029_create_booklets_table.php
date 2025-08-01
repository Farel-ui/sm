<?php
// database/migrations/xxxx_xx_xx_create_booklets_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookletsTable extends Migration
{
    public function up()
    {
        Schema::create('booklets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image'); // untuk cover
            $table->string('file');  // untuk file PDF
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('booklets');
    }
}
