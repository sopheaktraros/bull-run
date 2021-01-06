<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_invitations', function (Blueprint $table) {
            $table->id();
            $table->string('invitation_no');
            $table->integer('loan_id');
            $table->integer('customer_id');
            $table->integer('overdue_day');
            $table->decimal('overdue_amount', $precision = 8, $scale = 2)->comment('Include penalty');
            $table->string('overdue_amount_text');
            $table->decimal('total_payment_amount', $precision = 8, $scale = 2);
            $table->string('total_payment_amount_text');
            $table->decimal('penalty_amount', $precision = 8, $scale = 2);
            $table->string('penalty_amount_in_text');
            $table->dateTime('expired_date');
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
        Schema::dropIfExists('loan_invitations');
    }
}
