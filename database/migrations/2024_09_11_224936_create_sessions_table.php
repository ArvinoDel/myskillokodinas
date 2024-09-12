<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id', 255)->primary(); // kolom id dengan tipe varchar 255 sebagai primary key
            $table->unsignedBigInteger('user_id')->nullable()->default(null); // kolom user_id dengan tipe bigint unsigned, nullable dan default null
            $table->string('ip_address', 45)->nullable()->default(null); // kolom ip_address dengan tipe varchar 45, nullable dan default null
            $table->text('user_agent')->nullable()->default(null); // kolom user_agent dengan tipe text, nullable dan default null
            $table->longText('payload'); // kolom payload dengan tipe longtext
            $table->integer('last_activity'); // kolom last_activity dengan tipe int

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
        Schema::dropIfExists('sessions');
    }
}
