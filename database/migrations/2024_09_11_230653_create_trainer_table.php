<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainer', function (Blueprint $table) {
            $table->id('id_trainer'); // kolom id_trainer dengan tipe int dan auto increment sebagai primary key
            $table->string('nama_trainer', 255)->nullable(); // kolom nama_trainer dengan tipe varchar 255, nullable
            $table->string('foto', 255)->nullable(); // kolom foto dengan tipe varchar 255, nullable

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
        Schema::dropIfExists('trainer');
    }
}
