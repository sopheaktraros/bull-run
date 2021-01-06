<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_incomes', function (Blueprint $table) {
            $table->id();
            $table->integer('loan_id');
            $table->integer('customer_id');
            $table->string('job');
            $table->string('company');
            $table->string('address');
            $table->string('phone');
            $table->decimal('income', $precision = 19, $scale = 2);
            $table->integer('created_by');
            $table->integer('updated_by')->default(0);
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
        Schema::dropIfExists('customer_incomes');
    }
}
