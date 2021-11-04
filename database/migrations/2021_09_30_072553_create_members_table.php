<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('relation')->default(0);
            $table->string('sodowo');
            $table->date('dob');
            $table->string('email')->default('NA');
            $table->string('address');
            $table->string('image');
            $table->string('cnic')->default(0);
            $table->smallInteger('city');
            $table->smallInteger('country');
            $table->string('sec_phone')->default(0);
            $table->string('pri_phone')->default(0);
            $table->smallInteger('member_type')->default(0);
            $table->smallInteger('member_status')->default(1);
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
        Schema::dropIfExists('member');
    }
}
