<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_reminders', function (Blueprint $table) {
            $table->id();
            $table->integer('loan_id');
            $table->integer('customer_id');
            $table->date('late_payment_date');
            $table->dateTime('expired_date');
            $table->decimal('payment_amount', $precision = 8, $scale = 2);
            $table->string('payment_amount_in_text');
            $table->decimal('penalty_amount', $precision = 8, $scale = 2);
            $table->string('penalty_amount_in_text');
            $table->decimal('total_payment_amount', $precision = 8, $scale = 2);
            $table->string('total_payment_amount_in_text');
            $table->decimal('total_credit', $precision = 8, $scale = 2);
            $table->string('total_credit_in_text');
            $table->text('file_location')->nullable(true);
            $table->tinyInteger('delete')->default(0);
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
        Schema::dropIfExists('loan_reminders');
    }
}
