<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program', function (Blueprint $table) {
            $table->id('id_program'); // kolom id_program dengan tipe int dan auto increment sebagai primary key
            $table->unsignedInteger('id_trainer')->nullable()->default(null); // kolom id_trainer dengan tipe int, nullable, dan default null
            $table->string('judul_program', 255)->nullable()->default(null); // kolom judul_program dengan tipe varchar 255, nullable, dan default null
            $table->text('keterangan')->nullable()->default(null); // kolom keterangan dengan tipe text, nullable, dan default null
            $table->string('harga', 255); // kolom harga dengan tipe varchar 255
            $table->string('gambar', 255); // kolom gambar dengan tipe varchar 255
            $table->date('tanggal'); // kolom tanggal dengan tipe date
            $table->unsignedInteger('id_kategori_program')->nullable()->default(null); // kolom id_kategori_program dengan tipe int, nullable, dan default null

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
        Schema::dropIfExists('program');
    }
}
