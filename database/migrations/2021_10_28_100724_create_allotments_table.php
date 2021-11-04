<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllotmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allotments', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('project_id');
            $table->smallInteger('sector_id');
            $table->smallInteger('street_id');
            $table->smallInteger('size_id');
            $table->smallInteger('unit_id');
            $table->smallInteger('member_id');
            $table->date('allotment_date');
            $table->string('remarks');
            $table->string('allotment_no');
            $table->smallInteger('payment_type');
            $table->smallInteger('status');
            $table->smallInteger('user_id');
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
        Schema::dropIfExists('allotments');
    }
}
