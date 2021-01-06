<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //INSERT DATA AFTER RELEASE PAYMENT SCHEDULE
        Schema::create('loan_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('loan_id');
            $table->integer('customer_id');
            $table->integer('schedule_id')->comment('retreive from loan_schedule table');
            $table->integer('total_penalty_day')->nullable(true)->comment('number day late, update when customer paid');
            $table->date('penalty_from')->nullable(true)->comment('update when customer paid');
            $table->date('penalty_to')->nullable(true)->comment('update when customer paid');
            $table->decimal('penalty_amount', $precision = 8, $scale = 2)->nullable(true)->comment('update when customer paid');
            $table->decimal('total_penalty_amount', $precision = 8, $scale = 2)->nullable(true)->comment('update when customer paid');
            $table->decimal('payment_amount', $precision = 8, $scale = 2)->nullable(true);
            $table->date('maturity_date')->nullable(true)->comment('retrieve from loan schedule');
            $table->date('paid_date')->nullable(true)->comment('update when customer paid');
            $table->integer('payment_method');
            $table->tinyInteger('status')->default(0)->comment('0=UNPAID, 1=PAID');
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
        Schema::dropIfExists('loan_payments');
    }
}
