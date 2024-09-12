<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelHasRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_has_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('role_is'); // kolom role_is dengan tipe bigint unsigned
            $table->string('model_type', 255); // kolom model_type dengan tipe varchar 255
            $table->unsignedBigInteger('model_id'); // kolom model_id dengan tipe bigint unsigned

            // Menambahkan primary key jika diperlukan atau kombinasi unik
            $table->primary(['role_is', 'model_type', 'model_id']);

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
        Schema::dropIfExists('model_has_roles');
    }
}
