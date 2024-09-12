<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identitas', function (Blueprint $table) {
            $table->id('id_identitas'); // Primary key, auto increment
            $table->string('nama_website', 100);
            $table->string('email', 100);
            $table->string('url', 100);
            $table->text('facebook');
            $table->string('rekening', 100);
            $table->string('no_telp', 20);
            $table->string('meta_deskripsi', 250);
            $table->string('meta_keyword', 250);
            $table->string('favicon', 50);
            $table->text('maps');
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
        Schema::dropIfExists('identitas');
    }
}
