<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanRequestApprovedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_request_approved', function (Blueprint $table) {
            $table->id();
            $table->string('approved_no')->nullable(true);
            $table->integer('loan_id');
            $table->integer('customer_id');
            $table->decimal('house_price', $precision = 19, $scale = 2)->comment('retrieve from loan table');
            $table->decimal('max_loan_amount', $precision = 19, $scale = 2)->comment('Max 10% of housing prices');
            $table->decimal('credit_amount', $precision = 19, $scale = 2)->comment('retrieve from loan table');
            $table->decimal('monthly_payment', $precision = 19, $scale = 2)->comment('retrieve from loan table');
            $table->string('source_of_income')->comment('retrieve from customer_income table ( Staff, ... )');
            $table->decimal('total_avg_income', $precision = 19, $scale = 2)->comment('retrieve from customer_income table');
            $table->integer('category_id')->comment('retrieve from loan table');
            $table->integer('period_id')->comment('retrieve from loan table');
            $table->integer('total_product_qty')->comment('retrieve from loan_detail table');
            $table->decimal('total_price', $precision = 19, $scale = 2)->comment('retrieve from loan table');
            $table->decimal('additional_cash_request_amount', $precision = 19, $scale = 2)->comment('retrieve from loan table');
            $table->decimal('total_bought', $precision = 19, $scale = 2)->comment('retrieve from loan table');
            $table->decimal('first_payment', $precision = 19, $scale = 2)->comment('retrieve from loan table');
            $table->decimal('discount', $precision = 19, $scale = 2)->comment('retrieve from loan table');
            $table->decimal('actual_installment_payment', $precision = 19, $scale = 2)->comment('retrieve from loan table');
            $table->text('analytical_cmt')->nullable(true);
            $table->text('credit_cmt')->nullable(true);
            $table->tinyInteger('is_special')->default(0);
            $table->text('special_request')->nullable(true);
            $table->integer('created_by');
            $table->integer('updated_by')->default(0);
            $table->integer('approved_by')->default(0);
            $table->dateTime('approved_date')->nullable(true);
            $table->text('file_location')->nullable(true);
            $table->tinyInteger('status')->default(0)->comment('0=Pending, 1=Approved if is_special = 0 status auto approved and approved by created by');
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
        Schema::dropIfExists('loan_request_approved');
    }
}
