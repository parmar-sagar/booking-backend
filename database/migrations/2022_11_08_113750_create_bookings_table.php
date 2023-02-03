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
            $table->string('pickup_time',20);
            $table->tinyInteger('status')->default(1)->comment('1 => Order Placed , 2 => In Progress, 3 => Canceled, 4 => Completed')->index('idx_status');
            $table->tinyInteger('payment_status')->default(0)->comment('0 => unpaid , 1 => paid')->index('idx_payment_status');
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
