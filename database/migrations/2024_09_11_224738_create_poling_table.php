<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poling', function (Blueprint $table) {
            $table->id('id_poling'); // kolom id_poling dengan tipe int dan auto increment sebagai primary key
            $table->string('pilihan', 100); // kolom pilihan dengan tipe varchar 100
            $table->string('status', 20); // kolom status dengan tipe varchar 20
            $table->string('username', 50); // kolom username dengan tipe varchar 50
            $table->integer('rating')->default(0); // kolom rating dengan tipe int, default 0
            $table->enum('aktif', ['Y', 'N']); // kolom aktif dengan tipe enum, nilai bisa 'Y' atau 'N'

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
        Schema::dropIfExists('poling');
    }
}
