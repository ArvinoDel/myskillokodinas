<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIklanTengahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iklantengah', function (Blueprint $table) {
            $table->id('id_iklantengah'); // Primary key, auto increment
            $table->string('judul', 100);
            $table->string('username', 50);
            $table->string('url', 100)->nullable(); // Nullable, default NULL
            $table->string('gambar', 100);
            $table->date('tgl_posting');
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
        Schema::dropIfExists('iklantengah');
    }
}
