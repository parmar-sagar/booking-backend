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
            $table->string('random_id',50)->index('idx_random_id');
            $table->unsignedBigInteger('user_id')->index('idx_user_id');
            $table->decimal('discount')->default(0);
            $table->decimal('sub_total')->default(0);
            $table->decimal('extra_amount')->default(0);
            $table->decimal('total')->default(0);
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->string('mobile',20);
            $table->string('email',100);
            $table->string('pickup_location',100);
            $table->string('no_of_travelers',20);
            $table->string('coupon',50)->nullable();
            $table->string('status',50)->default('Order Placed')->comment('1 => Order Placed , 2 => In Progress, 3 => Canceled, 4 => Completed')->index('idx_status');
            $table->string('payment_status',50)->default('Unpaid')->comment('0 => Unpaid , 1 => Paid')->index('idx_payment_status');
            $table->string('payment_method',50)->default('Payment on Arrival')->comment('Paypal,Stripe,Payment on Arrival');
            $table->string('voucher',250);
            $table->tinyInteger('is_voucher')->default(0)->comment('0 => Not Voucher , 1 => Voucher')->index('idx_is_voucher');
            $table->tinyInteger('is_redeem')->default(1)->comment('1 => Redeem , 2 => Not Redeem')->index('idx_is_redeem');
            $table->datetime('voucher_expiry_date');
            $table->string('security_code',250);
            $table->datetime('redeem_date');
            $table->datetime('voucher_expiry_date');
            $table->string('voucher');
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
