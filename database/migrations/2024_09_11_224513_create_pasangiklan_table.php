<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasangiklanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasangiklan', function (Blueprint $table) {
            $table->id('id_pasangiklan'); // kolom id_pasangiklan dengan tipe int dan auto increment
            $table->string('judul', 100); // kolom judul dengan tipe varchar 100
            $table->string('username', 50); // kolom username dengan tipe varchar 50
            $table->string('url', 100); // kolom url dengan tipe varchar 100
            $table->string('gambar', 100)->nullable(); // kolom gambar dengan tipe varchar 100, nullable jika tidak selalu ada
            $table->date('tgl_posting'); // kolom tgl_posting dengan tipe date

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
        Schema::dropIfExists('pasangiklan');
    }
}
