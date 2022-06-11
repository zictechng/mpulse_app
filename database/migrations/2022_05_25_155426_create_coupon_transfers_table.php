<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_transfers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('rec_id')->unsigned();
            $table->string('sender_email')->nullable();
            $table->string('sender_name')->nullable();
            $table->string('rec_email')->nullable();
            $table->string('rec_name')->nullable('');
            $table->string('status')->nullable();
            $table->float('amt_send')->default('0.00');

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
        Schema::dropIfExists('coupon_transfers');
    }
}
