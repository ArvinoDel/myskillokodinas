<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id()->unsigned(); // kolom id dengan tipe bigint unsigned dan auto increment
            $table->string('name', 255); // kolom name dengan tipe varchar 255
            $table->string('guard_name', 255); // kolom guard_name dengan tipe varchar 255
            $table->timestamps(0); // kolom created_at dan updated_at dengan tipe timestamp, nullable dan default NULL

            // Menambahkan primary key jika diperlukan atau gabungan unik jika ada kolom lain
            // $table->primary('id'); // tidak perlu jika menggunakan $table->id()
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
