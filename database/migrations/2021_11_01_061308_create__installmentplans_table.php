<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallmentplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Installmentplans', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('project_id');
            $table->smallInteger('size_id');
            $table->smallInteger('type');
            $table->string('plan_detail');
            $table->smallInteger('noi');
            $table->bigInteger('total_amount');
            $table->smallInteger('status');
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
        Schema::dropIfExists('Installmentplans');
    }
}
