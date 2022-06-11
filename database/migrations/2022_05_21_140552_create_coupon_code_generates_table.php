<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponCodeGeneratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_code_generates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('partner_id')->nullable()->default(12);
            $table->string('generate_code')->nullable();
            $table->string('code_amount')->nullable();
            $table->string('partner_status')->nullable();
            $table->string('code_status')->nullable();
            $table->string('user_id')->nullable();
            $table->string('code_use_date')->nullable();
            $table->string('partn_reg_date')->nullable();
            $table->string('partn_confirmdate')->nullable();
            $table->string('partn_pay_code')->nullable();
            $table->string('partn_batch_code')->nullable();
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
        Schema::dropIfExists('coupon_code_generates');
    }
}
