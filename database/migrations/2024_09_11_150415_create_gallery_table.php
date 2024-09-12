<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery', function (Blueprint $table) {
            $table->id('id_gallery'); // Primary key, auto increment
            $table->unsignedBigInteger('id_album'); // Foreign key untuk album
            $table->string('username', 50);
            $table->string('jdl_gallery', 100);
            $table->string('gallery_seo', 100);
            $table->text('keterangan');
            $table->string('gbr_gallery', 100);
            $table->timestamps(); // Adds created_at and updated_at columns

            // Optional: Define foreign key constraint
            // $table->foreign('id_album')->references('id_album')->on('album')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery');
    }
}
