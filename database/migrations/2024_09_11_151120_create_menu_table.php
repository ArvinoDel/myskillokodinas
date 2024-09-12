<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->id('id_menu'); // Primary key, auto increment
            $table->unsignedInteger('id_parent')->default(0); // Default 0 for no parent
            $table->string('nama_menu', 30);
            $table->string('link', 100);
            $table->enum('aktif', ['Ya', 'Tidak'])->default('Ya'); // Enum for aktif with default 'Ya'
            $table->enum('position', ['Top', 'Bottom'])->nullable()->default('Bottom'); // Nullable, default 'Bottom'
            $table->integer('urutan');
            $table->text('deskripsi')->nullable(); // Nullable, default NULL
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
