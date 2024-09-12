<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordResetTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email', 255); // kolom email dengan tipe varchar 255
            $table->string('token', 255); // kolom token dengan tipe varchar 255
            $table->timestamp('created_at')->nullable()->default(null); // kolom created_at dengan tipe timestamp, nullable dan default null

            // Menambahkan primary key jika diperlukan atau indeks unik
            $table->primary(['email', 'token']); // Kombinasi dari kolom email dan token sebagai primary key

            // Atau, jika Anda hanya ingin satu primary key:
            // $table->increments('id'); // jika Anda ingin menggunakan auto increment ID
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_reset_tokens');
    }
}
