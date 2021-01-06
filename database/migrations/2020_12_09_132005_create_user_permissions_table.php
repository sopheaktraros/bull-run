<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id');
            $table->string('name');
            $table->integer('group');
            $table->integer('order');
            $table->string('route');
            $table->string('icon');
            $table->tinyInteger('active');
            $table->tinyInteger('enable');
            $table->tinyInteger('write');
            $table->tinyInteger('update');
            $table->tinyInteger('delete');
            $table->tinyInteger('viewall');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_permissions');
    }
}
