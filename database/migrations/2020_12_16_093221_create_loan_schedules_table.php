<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('agreement_no')->nullable(true);
            $table->integer('loan_id');
            $table->integer('customer_id');
            $table->date('due_date');
            $table->decimal('payment_amount', $precision = 19, $scale = 2);
            $table->decimal('remain_amount', $precision = 19, $scale = 2);
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
        Schema::dropIfExists('loan_schedules');
    }
}
