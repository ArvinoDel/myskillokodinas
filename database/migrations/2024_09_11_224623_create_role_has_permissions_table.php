<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleHasPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id'); // kolom permission_id dengan tipe bigint unsigned
            $table->unsignedBigInteger('role_id'); // kolom role_id dengan tipe bigint unsigned

            // Menambahkan primary key jika diperlukan atau gabungan unik
            $table->primary(['permission_id', 'role_id']); // Kombinasi dari kolom permission_id dan role_id sebagai primary key

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
        Schema::dropIfExists('role_has_permissions');
    }
}
