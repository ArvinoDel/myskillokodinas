<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHalamanStatisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('halamanstatis', function (Blueprint $table) {
            $table->id('id_halaman'); // Primary key, auto increment
            $table->string('judul', 100);
            $table->string('judul_seo', 100);
            $table->text('isi_halaman');
            $table->date('tgl_posting');
            $table->string('gambar', 100);
            $table->string('username', 50);
            $table->integer('dibaca')->default(1); // Default value is 1
            $table->time('jam');
            $table->string('hari', 20);
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('halamanstatis');
    }
}
