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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone');
            $table->string('sex')->nullable();
            $table->string('state')->nullable();
            $table->string('location')->nullable();
            $table->string('address')->nullable();
            $table->string('username')->nullable();
            $table->string('dob')->nullable();
            $table->string('mpcode')->nullable();
            $table->string('acct_status')->nullable();
            $table->string('reg_status')->nullable();
            $table->string('occupation')->nullable();
            $table->string('married_status')->nullable();
            $table->string('reg_date')->nullable();
            $table->string('gamount')->nullable();
            $table->string('acctno')->nullable();
            $table->string('acct_name')->nullable();
            $table->string('bankname')->nullable();
            $table->string('photo')->nullable();
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