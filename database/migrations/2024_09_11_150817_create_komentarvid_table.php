<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarVidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentarvid', function (Blueprint $table) {
            $table->id('id_komentar'); // Primary key, auto increment
            $table->unsignedBigInteger('id_video'); // Foreign key untuk video
            $table->string('nama_komentar', 100);
            $table->string('url', 100);
            $table->text('isi_komentar');
            $table->date('tgl');
            $table->time('jam_komentar');
            $table->enum('aktif', ['Y', 'N'])->default('Y'); // Enum for aktif with default 'Y'
            $table->timestamps(); // Adds created_at and updated_at columns

            // Optional: Define foreign key constraint
            // $table->foreign('id_video')->references('id_video')->on('video')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komentarvid');
    }
}
