<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimoniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimoni', function (Blueprint $table) {
            $table->id('id_testimoni'); // kolom id_testimoni dengan tipe int dan auto increment sebagai primary key
            $table->string('gambar', 50); // kolom gambar dengan tipe varchar 50
            $table->string('link', 255); // kolom link dengan tipe varchar 255 untuk menyimpan URL

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
        Schema::dropIfExists('testimoni');
    }
}
