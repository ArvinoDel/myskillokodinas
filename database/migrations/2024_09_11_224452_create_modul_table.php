<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modul', function (Blueprint $table) {
            $table->id('id_modul'); // kolom id_modul dengan tipe int dan auto increment
            $table->string('nama_modul', 50); // kolom nama_modul dengan tipe varchar 50
            $table->string('username', 50); // kolom username dengan tipe varchar 50
            $table->string('link', 100); // kolom link dengan tipe varchar 100
            $table->text('static_content')->nullable(); // kolom static_content dengan tipe text, nullable jika tidak selalu ada
            $table->string('gambar', 100)->nullable(); // kolom gambar dengan tipe varchar 100, nullable jika tidak selalu ada
            $table->enum('publish', ['Y', 'N'])->default('Y'); // kolom publish dengan tipe enum
            $table->enum('status', ['user', 'admin', 'kontributor']); // kolom status dengan tipe enum
            $table->enum('aktif', ['Y', 'N'])->default('Y'); // kolom aktif dengan tipe enum
            $table->integer('urutan')->nullable(); // kolom urutan dengan tipe int, nullable jika tidak selalu ada
            $table->string('link_seo', 50)->nullable(); // kolom link_seo dengan tipe varchar 50, nullable jika tidak selalu ada

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
        Schema::dropIfExists('modul');
    }
}
