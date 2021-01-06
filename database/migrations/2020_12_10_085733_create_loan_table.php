<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('loan', function (Blueprint $table) {
            $table->id();
            $table->string('loan_no')->nullable(true);
            $table->integer('customer_id');
            $table->integer('project_id');
            $table->integer('house_type_id');
            $table->decimal('house_price', $precision = 19, $scale = 2);
            $table->string('house_no')->nullable(true);
            $table->string('road')->nullable(true);
            $table->string('group')->nullable(true);
            $table->string('village')->nullable(true);
            $table->string('commune')->nullable(true);
            $table->string('district')->nullable(true);
            $table->string('city')->nullable(true)->comment('can be province or city');
            $table->integer('institution_id');
            $table->decimal('institution_loan_amount', $precision = 19, $scale = 2);
            $table->integer('institution_perid');
            $table->decimal('institution_pay_amount', $precision = 19, $scale = 2);
            $table->decimal('request_loan_amount', $precision = 19, $scale = 2);
            $table->integer('request_period_id');
            $table->decimal('request_interest_amount', $precision = 19, $scale = 2);
            $table->date('second_payment_date')->nullable(true);
            $table->decimal('avg_income', $precision = 19, $scale = 2)->nullable(true);
            $table->date('start_date')->nullable(true);
            $table->date('maturity_date')->nullable(true);
            $table->decimal('total_price', $precision = 19, $scale = 2);
            $table->decimal('additional_cash_request_amount', $precision = 19, $scale = 2);
            $table->decimal('total_bought', $precision = 19, $scale = 2);
            $table->decimal('first_payment', $precision = 19, $scale = 2);
            $table->decimal('discount', $precision = 19, $scale = 2);
            $table->decimal('actual_installment_payment', $precision = 19, $scale = 2);
            $table->decimal('monthly_payment', $precision = 19, $scale = 2);
            $table->text('file_location')->nullable(true);
            $table->integer('created_by');
            $table->integer('updated_by')->default(0);
            $table->tinyInteger('status')->default(0)->comment('0=Review, 1=Approved, 2=Reject, 3=Paying');
            $table->integer('approved_by')->default(0);
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
        Schema::dropIfExists('loan');
    }
}
