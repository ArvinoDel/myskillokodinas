<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSekilasinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekilasinfo', function (Blueprint $table) {
            $table->id('id_sekilas'); // kolom id_sekilas dengan tipe int dan auto increment sebagai primary key
            $table->string('info', 100); // kolom info dengan tipe varchar 100
            $table->date('tgl_posting'); // kolom tgl_posting dengan tipe date
            $table->string('gambar', 100); // kolom gambar dengan tipe varchar 100
            $table->enum('aktif', ['Y', 'N'])->default('Y'); // kolom aktif dengan tipe enum ('Y', 'N'), default "Y"

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
        Schema::dropIfExists('sekilasinfo');
    }
}
