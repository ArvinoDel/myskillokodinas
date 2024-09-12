<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelHasPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_is'); // kolom permission_is dengan type bigint unsigned
            $table->string('model_type', 255); // kolom model_type dengan type varchar 255
            $table->unsignedBigInteger('model_id'); // kolom model_id dengan type bigint unsigned

            // Menambahkan primary key jika diperlukan atau kombinasi unik
            $table->primary(['permission_is', 'model_type', 'model_id']);

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
        Schema::dropIfExists('model_has_permissions');
    }
}
