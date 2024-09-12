<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatistikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistik', function (Blueprint $table) {
            $table->string('ip', 20); // kolom ip dengan tipe varchar 20
            $table->date('tanggal'); // kolom tanggal dengan tipe date
            $table->integer('hits')->default(1); // kolom hits dengan tipe int, default 1
            $table->string('online', 255); // kolom online dengan tipe varchar 255

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
        Schema::dropIfExists('statistik');
    }
}
