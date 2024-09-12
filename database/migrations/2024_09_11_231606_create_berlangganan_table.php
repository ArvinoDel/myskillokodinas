<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerlanggananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berlangganan', function (Blueprint $table) {
            $table->id(); // kolom id (int) auto increment sebagai primary key
            $table->string('masa_berlangganan', 255)->nullable(); // kolom masa_berlangganan dengan tipe varchar 255, nullable
            $table->decimal('harga_berlangganan', 10, 2)->nullable(); // kolom harga_berlangganan dengan tipe decimal (10,2), nullable
            $table->decimal('harga_diskon', 10, 2)->nullable(); // kolom harga_diskon dengan tipe decimal (10,2), nullable
            $table->tinyInteger('is_active')->nullable(); // kolom is_active dengan tipe tinyint (1), nullable
            $table->tinyInteger('is_populer')->nullable(); // kolom is_populer dengan tipe tinyint (1), nullable

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
        Schema::dropIfExists('berlangganan');
    }
}
