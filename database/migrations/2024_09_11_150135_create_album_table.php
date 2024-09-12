<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album', function (Blueprint $table) {
            $table->id('id_album'); // Primary key, auto increment
            $table->string('jdl_album', 100);
            $table->string('album_seo', 100);
            $table->text('keterangan');
            $table->string('gbr_album', 100);
            $table->enum('aktif', ['y', 'n'])->default('y'); // Enum for aktif with default 'y'
            $table->integer('hits_album')->default(1); // Default value is 1
            $table->date('tgl_posting');
            $table->time('jam');
            $table->string('hari', 20);
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
        Schema::dropIfExists('album');
    }
}
