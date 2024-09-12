<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video', function (Blueprint $table) {
            $table->id('id_video'); // kolom id_video dengan tipe int dan auto increment sebagai primary key
            $table->integer('id_playlist'); // kolom id_playlist dengan tipe int untuk referensi playlist
            $table->string('username', 30); // kolom username dengan tipe varchar 30
            $table->string('jdl_video', 100); // kolom jdl_video dengan tipe varchar 100 untuk judul video
            $table->string('video_seo', 100); // kolom video_seo dengan tipe varchar 100 untuk SEO video
            $table->text('keterangan'); // kolom keterangan dengan tipe text untuk deskripsi video
            $table->string('gbr_video', 100); // kolom gbr_video dengan tipe varchar 100 untuk menyimpan gambar video
            $table->string('video', 100); // kolom video dengan tipe varchar 100 untuk menyimpan nama file video
            $table->string('youtube', 100); // kolom youtube dengan tipe varchar 100 untuk menyimpan link YouTube
            $table->integer('dilihat')->default(1); // kolom dilihat dengan tipe int, default 1 untuk jumlah view
            $table->string('hari', 20); // kolom hari dengan tipe varchar 20 untuk menyimpan hari
            $table->date('tanggal'); // kolom tanggal dengan tipe date untuk menyimpan tanggal upload video
            $table->time('jam'); // kolom jam dengan tipe time untuk menyimpan jam upload video
            $table->string('tagvid', 100); // kolom tagvid dengan tipe varchar 100 untuk menyimpan tag video
            $table->integer('id_program')->nullable(); // kolom id_program dengan tipe int, nullable untuk referensi program

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
        Schema::dropIfExists('video');
    }
}
