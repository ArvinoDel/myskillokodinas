<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHubungiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hubungi', function (Blueprint $table) {
            $table->id('id_hubungi'); // Primary key, auto increment
            $table->string('nama', 50);
            $table->string('email', 100);
            $table->string('subjek', 100);
            $table->text('pesan');
            $table->date('tanggal');
            $table->time('jam');
            $table->enum('dibaca', ['Y', 'N'])->default('N'); // Enum for dibaca with default 'N'
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
        Schema::dropIfExists('hubungi');
    }
}
