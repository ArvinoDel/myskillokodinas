<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_comment', function (Blueprint $table) {
            $table->id('id_komentar'); // kolom id_komentar dengan tipe int dan auto increment sebagai primary key
            $table->integer('reply'); // kolom reply dengan tipe int, untuk menyimpan id komentar yang direply
            $table->string('nama_lengkap', 150); // kolom nama_lengkap dengan tipe varchar 150
            $table->string('alamat_email', 150); // kolom alamat_email dengan tipe varchar 150
            $table->text('isi_pesan'); // kolom isi_pesan dengan tipe text
            $table->date('tanggal_komentar'); // kolom tanggal_komentar dengan tipe date
            $table->time('jam_komentar'); // kolom jam_komentar dengan tipe time

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
        Schema::dropIfExists('tbl_comment');
    }
}
