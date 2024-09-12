<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListProgramUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_program_user', function (Blueprint $table) {
            $table->id('id_list_program_user'); // Primary key, auto increment
            $table->unsignedBigInteger('id')->nullable(); // Nullable, default NULL
            $table->unsignedInteger('id_program')->nullable(); // Nullable, default NULL
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
        Schema::dropIfExists('list_program_user');
    }
}
