<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('fname');
            $table->string('image');
            $table->string('cnic')->default(0);
            $table->string('phone')->default(0);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address');
            $table->smallInteger('department');
            $table->smallInteger('designation');
            $table->smallInteger('user_type')->default(0);
            $table->smallInteger('user_status')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
