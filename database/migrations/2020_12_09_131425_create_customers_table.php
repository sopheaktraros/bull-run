<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_kh');
            $table->string('nickname')->nullable(true);
            $table->string('gender',10);
            $table->string('nationality');
            $table->integer('id_type')->comment('1=id card, 2=family book,...');
            $table->string('id_name')->nullable(true)->comment('if id_type == other, insert this field');
            $table->string('id_number');
            $table->date('issue_date')->comment('issue date of id');
            $table->date('expired_date')->comment('expired date of id');
            $table->string('issue_by')->comment('district,..');
            $table->date('dob');
            $table->integer('family_status')->comment('1=single, 2=married,...');
            $table->string('home')->nullable(true);
            $table->string('road')->nullable(true);
            $table->string('group')->nullable(true);
            $table->string('village')->nullable(true);
            $table->string('commune')->nullable(true);
            $table->string('district')->nullable(true);
            $table->string('city')->nullable(true)->comment('can be province or city');
            $table->string('job');
            $table->string('phone_number');
            $table->string('account_number')->nullable(true);
            //
            $table->integer('participant_job_id')->nullable(true);
            $table->string('participant_name_en')->nullable(true);
            $table->string('participant_name_kh')->nullable(true);
            $table->string('participant_nickname')->nullable(true);
            $table->string('participant_gender',10)->nullable(true);
            $table->string('participant_nationality')->nullable(true);
            $table->integer('participant_id_type')->nullable(true);
            $table->string('participant_id_name')->nullable(true);
            $table->string('participant_id_number')->nullable(true);
            $table->date('participant_issue_date')->nullable(true);
            $table->date('participant_participant_expired_date')->nullable(true);
            $table->string('participant_issue_by')->nullable(true);
            $table->date('participant_dob')->nullable(true);
            $table->integer('participant_family_status')->nullable(true);
            $table->string('participant_home')->nullable(true);
            $table->string('participant_participant_road')->nullable(true);
            $table->string('participant_group')->nullable(true);
            $table->string('participant_village')->nullable(true);
            $table->string('participant_commune')->nullable(true);
            $table->string('participant_district')->nullable(true);
            $table->string('participant_city')->nullable(true);
            $table->string('participant_phone_number')->nullable(true);
            $table->string('participant_job');
            $table->integer('created_by');
            $table->integer('updated_by')->default(0);
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('customers');
    }
}
