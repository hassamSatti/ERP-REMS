<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('project_id');
            $table->smallInteger('sector_id');
            $table->smallInteger('street_id');
            $table->smallInteger('size_id');
            $table->smallInteger('type');
            $table->smallInteger('category');
            $table->smallInteger('price');
            $table->string('name');
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
        Schema::dropIfExists('units');
    }
}
