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
            $table->unsignedBigInteger('price_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('addon_id')->index();
            $table->string('status');
            $table->string('payment_status')->default('unpaid');
            $table->integer('discount');
            $table->string('sub_total');
            $table->string('final_ammount');
            $table->string('qty');
            $table->string('name', 50);
            $table->string('number', 10)->index();
            $table->string('pincode', 10);
            $table->string('state', 50);
            $table->string('city', 50);
            $table->string('house_no', 50);
            $table->string('road_name', 50);
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
