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
            $table->unsignedBigInteger('booking_id')->index('idx_booking_id');
            $table->unsignedBigInteger('user_id')->index('idx_user_id');
            $table->enum('status',['0','1'])->default(1)->comment('0 => deactive , 1 => active')->index('idx_status');
            $table->enum('payment_status',['0','1'])->default(0)->comment('0 => unpaid , 1 => paid');
            $table->decimal('discount');
            $table->decimal('sub_total');
            $table->decimal('total');
            $table->string('billing_name', 50);
            $table->string('billing_mobile', 10)->index('mobile');
            $table->string('billing_pincode', 10);
            $table->string('locality', 10);
            $table->text('address');
            $table->string('billing_state', 50);
            $table->string('billing_city', 50);
            $table->string('landmark', 50)->nullable();
            $table->string('billing_house_no', 50);
            $table->date('date');
            $table->time('time');
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent()->index('idx_created_at');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate()->index('idx_updated_at');
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
