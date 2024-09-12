<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id()->unsigned(); // kolom id dengan tipe bigint unsigned dan auto increment
            $table->string('name', 255); // kolom name dengan tipe varchar 255
            $table->string('guard_name', 255); // kolom guard_name dengan tipe varchar 255
            $table->timestamps(0); // kolom created_at dan updated_at dengan tipe timestamp, nullable dan default NULL
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
