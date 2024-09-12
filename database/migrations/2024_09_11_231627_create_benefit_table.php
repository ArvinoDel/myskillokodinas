<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenefitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefit', function (Blueprint $table) {
            $table->id('id_benefit'); // kolom id_benefit (int) auto increment sebagai primary key
            $table->string('nama_benefit', 255)->nullable()->default(null); // kolom nama_benefit dengan tipe varchar 255, nullable

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
        Schema::dropIfExists('benefit');
    }
}
