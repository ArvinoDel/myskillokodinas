<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_program', function (Blueprint $table) {
            $table->id('id_rating'); // kolom id_rating dengan tipe int dan auto increment sebagai primary key
            $table->unsignedInteger('id_program')->nullable()->default(null); // kolom id_program dengan tipe int, nullable dan default null
            $table->decimal('jml_rating', 3, 2)->nullable()->default(null); // kolom jml_rating dengan tipe decimal (3,2), nullable dan default null
            $table->unsignedBigInteger('id')->nullable()->default(null); // kolom id dengan tipe bigint, nullable dan default null

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
        Schema::dropIfExists('rating_program');
    }
}
