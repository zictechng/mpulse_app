<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('topup_email')->default('null')->nullable();
            $table->string('debit_email')->default('null')->nullable();
            $table->string('acct_email')->default('null')->nullable();
            $table->string('fa2_email')->default('null')->nullable();
            $table->string('credit_email')->default('null')->nullable();
            $table->string('update_email')->default('null')->nullable();
            $table->string('promo_email')->default('null')->nullable();
            $table->string('otp_email')->default('null')->nullable();
            $table->string('setting_status')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
