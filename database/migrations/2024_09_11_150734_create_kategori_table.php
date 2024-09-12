<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->id('id_kategori'); // Primary key, auto increment
            $table->string('nama_kategori', 50);
            $table->string('username', 50);
            $table->string('kategori_seo', 100);
            $table->enum('aktif', ['Y', 'N'])->default('Y'); // Enum for aktif with default 'Y'
            $table->integer('sidebar'); // Integer type for sidebar
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
        Schema::dropIfExists('kategori');
    }
}
