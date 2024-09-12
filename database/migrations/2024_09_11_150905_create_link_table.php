<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link', function (Blueprint $table) {
            $table->id('id_link'); // Primary key, auto increment
            $table->unsignedBigInteger('id_parent')->nullable(); // Nullable for parent link
            $table->string('nama_menu', 30);
            $table->string('link', 100)->nullable(); // Nullable, default NULL
            $table->enum('aktif', ['Ya', 'Tidak'])->default('Ya'); // Enum for aktif with default 'Ya'
            $table->string('groupname', 20)->nullable(); // Nullable, default NULL
            $table->integer('urutan');
            $table->text('deskripsi')->nullable(); // Nullable, default NULL
            $table->string('gambar', 30)->nullable(); // Nullable, default NULL
            $table->string('icon', 30)->default(''); // Default is empty string
            $table->timestamps(); // Adds created_at and updated_at columns

            // Optional: Define foreign key constraint
            // $table->foreign('id_parent')->references('id_link')->on('link')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('link');
    }
}
