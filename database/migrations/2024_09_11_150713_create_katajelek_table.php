<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKataJelekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('katajelek', function (Blueprint $table) {
            $table->id('id_jelek'); // Primary key, auto increment
            $table->string('kata', 60)->nullable(); // Nullable, default NULL
            $table->string('username', 50);
            $table->string('ganti', 60)->nullable(); // Nullable, default NULL
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
        Schema::dropIfExists('katajelek');
    }
}
