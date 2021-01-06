<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanDeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_delivery', function (Blueprint $table) {
            $table->id();
            $table->string('delivery_no')->nullable(true);
            $table->integer('loan_id');
            $table->integer('customer_id');
            $table->string('custiomer_account_no')->nullable(true);
            $table->string('phone_number')->comment('retrieve from customer table');
            $table->string('home')->nullable(true)->comment('retrieve from customer table but can be edit');
            $table->string('road')->nullable(true)->comment('retrieve from customer table but can be edit');
            $table->string('group')->nullable(true)->comment('retrieve from customer table but can be edit');
            $table->string('village')->nullable(true)->comment('retrieve from customer table but can be edit');
            $table->string('commune')->nullable(true)->comment('retrieve from customer table but can be edit');
            $table->string('district')->nullable(true)->comment('retrieve from customer table but can be edit');
            $table->string('city')->nullable(true)->comment('retrieve from customer table but can be edit');
            $table->tinyInteger('status')->default(0)->comment('0=Pending, 1=Approved');
            $table->integer('approved_by')->default(0);
            $table->dateTime('approved_date')->nullable(true);
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
        Schema::dropIfExists('loan_delivery');
    }
}
