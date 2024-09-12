<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag', function (Blueprint $table) {
            $table->id('id_tag'); // kolom id_tag dengan tipe int dan auto increment sebagai primary key
            $table->string('nama_tag', 100); // kolom nama_tag dengan tipe varchar 100
            $table->string('username', 50); // kolom username dengan tipe varchar 50
            $table->string('tag_seo', 100); // kolom tag_seo dengan tipe varchar 100
            $table->integer('count'); // kolom count dengan tipe int untuk menyimpan jumlah

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
        Schema::dropIfExists('tag');
    }
}
