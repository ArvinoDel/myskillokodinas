<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id('id_berita'); // Primary key, auto increment
            $table->unsignedBigInteger('id_kategori'); // Foreign key untuk kategori
            $table->string('username', 30);
            $table->string('judul', 100);
            $table->string('sub_judul', 255);
            $table->string('youtube', 100);
            $table->enum('headline', ['Y', 'N'])->default('Y'); // Default 'Y'
            $table->enum('aktif', ['Y', 'N'])->default('N'); // Default 'N'
            $table->enum('utama', ['Y', 'N'])->default('Y'); // Default 'Y'
            $table->longText('isi_berita');
            $table->text('keterangan_gambar');
            $table->string('hari', 20);
            $table->date('tanggal');
            $table->time('jam');
            $table->string('gambar', 100);
            $table->integer('dibaca')->default(1); // Default '1'
            $table->string('tag', 100);
            $table->enum('status', ['Y', 'N'])->default('Y'); // Default 'Y'
            $table->timestamps(); // Adds created_at and updated_at columns

            // Optional: Define foreign key constraint
            // $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berita');
    }
}
