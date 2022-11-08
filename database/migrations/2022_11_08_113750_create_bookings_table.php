<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->enum('status',['0','1'])->default(1)->comment('0 => deactive , 1 => active');
            $table->string('payment_status')->default('unpaid');
            $table->integer('discount');
            $table->string('sub_total');
            $table->string('total');
            $table->string('billing_name', 50);
            $table->string('billing_mobile', 10)->index();
            $table->string('billing_pincode', 10);
            $table->string('billing_state', 50);
            $table->string('billing_city', 50);
            $table->string('billing_house_no', 50);
            $table->string('billing_road_name', 50);
            $table->datetime('booking_date');
            $table->datetime('booking_time');
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
