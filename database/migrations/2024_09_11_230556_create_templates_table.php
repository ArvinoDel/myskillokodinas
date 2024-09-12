<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id('id_templates'); // kolom id_templates dengan tipe int dan auto increment sebagai primary key
            $table->string('judul', 100); // kolom judul dengan tipe varchar 100
            $table->string('username', 50); // kolom username dengan tipe varchar 50
            $table->string('pembuat', 50); // kolom pembuat dengan tipe varchar 50
            $table->string('folder', 50); // kolom folder dengan tipe varchar 50
            $table->enum('aktif', ['Y', 'N']); // kolom aktif dengan tipe enum ('Y', 'N')

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
        Schema::dropIfExists('templates');
    }
}
