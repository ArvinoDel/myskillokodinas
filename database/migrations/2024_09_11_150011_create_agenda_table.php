<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->id('id_agenda'); // Primary key, auto increment
            $table->string('tema', 100);
            $table->string('tema_seo', 100);
            $table->text('isi_agenda');
            $table->string('tempat', 100);
            $table->string('pengirim', 100);
            $table->string('gambar', 100); // Kolom gambar tidak nullable
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->date('tgl_posting');
            $table->string('jam', 50);
            $table->integer('dibaca')->default(0); // Default value for dibaca is 0
            $table->string('username', 50);
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
        Schema::dropIfExists('agenda');
    }
}
