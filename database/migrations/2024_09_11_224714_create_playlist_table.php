<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaylistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlist', function (Blueprint $table) {
            $table->id('id_playlist'); // kolom id_playlist dengan tipe int dan auto increment
            $table->string('jdl_playlist', 100); // kolom jdl_playlist dengan tipe varchar 100
            $table->string('username', 50); // kolom username dengan tipe varchar 50
            $table->string('playlist_seo', 100); // kolom playlist_seo dengan tipe varchar 100
            $table->string('gbr_playlist', 100)->nullable(); // kolom gbr_playlist dengan tipe varchar 100, nullable jika tidak selalu ada
            $table->enum('aktif', ['Y', 'N'])->default('Y'); // kolom aktif dengan tipe enum dengan nilai default "Y"

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
        Schema::dropIfExists('playlist');
    }
}
