<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenaltySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penalty_settings', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', $precision = 8, $scale = 2);
            $table->tinyInteger('condition')->default(0)->comment('0 is <=, 1 is >');
            $table->integer('from')->comment('1, 2');
            $table->integer('to');
            $table->decimal('penalty', $precision = 8, $scale = 2);
            $table->integer('created_by');
            $table->integer('updated_by')->default(0);
            $table->tinyInteger('delete')->default(0);
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
        Schema::dropIfExists('penalty_settings');
    }
}
