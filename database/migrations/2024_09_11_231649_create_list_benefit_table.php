<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListBenefitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_benefit', function (Blueprint $table) {
            $table->id('id_list_benefit'); // kolom id_list_benefit (int) auto increment sebagai primary key
            $table->integer('id_berlangganan')->nullable()->default(null); // kolom id_berlangganan dengan tipe int, nullable
            $table->integer('id_benefit')->nullable()->default(null); // kolom id_benefit dengan tipe int, nullable

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
        Schema::dropIfExists('list_benefit');
    }
}
