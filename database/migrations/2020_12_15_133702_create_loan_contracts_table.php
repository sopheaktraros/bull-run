<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_contracts', function (Blueprint $table) {
            $table->id();
            $table->string('contract_no')->nullable(true);
            $table->integer('loan_id');
            $table->integer('customer_id');
            $table->decimal('contract_amount', $precision = 19, $scale = 2);
            $table->string('contract_amount_in_text');
            $table->decimal('loan_amount', $precision = 19, $scale = 2);
            $table->string('loan_amount_in_text');
            $table->decimal('monthly_payment', $precision = 19, $scale = 2);
            $table->string('monthly_payment_in_text');
            $table->integer('period_id');
            $table->date('loan_from');
            $table->date('loan_to');
            $table->decimal('first_payment', $precision = 19, $scale = 2);
            $table->string('first_payment_in_text');
            $table->decimal('service_rate', $precision = 19, $scale = 2)->default(1);
            $table->decimal('service_charge', $precision = 19, $scale = 2);
            $table->string('service_charge_in_text');
            $table->text('file_location')->nullable(true);
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
        Schema::dropIfExists('loan_contracts');
    }
}
