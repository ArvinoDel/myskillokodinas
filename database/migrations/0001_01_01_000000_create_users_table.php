<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // kolom id (bigint) auto increment sebagai primary key
            $table->string('username', 50); // kolom username dengan tipe varchar 50
            $table->string('password', 255); // kolom password dengan tipe varchar 255
            $table->string('nama_lengkap', 100); // kolom nama_lengkap dengan tipe varchar 100
            $table->string('email', 100); // kolom email dengan tipe varchar 100
            $table->string('no_telp', 20); // kolom no_telp dengan tipe varchar 20
            $table->string('foto', 100); // kolom foto dengan tipe varchar 100
            $table->string('level', 20); // kolom level dengan tipe varchar 20
            $table->enum('blokir', ['Y', 'N']); // kolom blokir dengan tipe enum ('Y', 'N')
            $table->string('id_session', 255); // kolom id_session dengan tipe varchar 255

            $table->timestamps(); // kolom created_at dan updated_at
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
