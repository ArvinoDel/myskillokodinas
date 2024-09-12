<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersModulTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_modul', function (Blueprint $table) {
            $table->id('id_umod'); // kolom id_umod dengan tipe int dan auto increment sebagai primary key
            $table->string('is_session', 255); // kolom is_session dengan tipe varchar 255
            $table->integer('id_modul'); // kolom id_modul dengan tipe int

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
        Schema::dropIfExists('users_modul');
    }
}
