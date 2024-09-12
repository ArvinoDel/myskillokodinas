<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModYmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mod_ym', function (Blueprint $table) {
            $table->id(); // kolom id dengan type int dan auto increment
            $table->string('nama', 255); // kolom nama dengan type varchar 255
            $table->string('username', 50); // kolom username dengan type varchar 50
            $table->integer('ym_icon'); // kolom ym_icon dengan type int
            $table->timestamps(); // kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mod_ym');
    }
}
