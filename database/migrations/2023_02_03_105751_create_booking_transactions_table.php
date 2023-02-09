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
        Schema::create('booking_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id')->index('idx_booking_id');
            $table->unsignedBigInteger('user_id')->index('idx_user_id');
            $table->string('token');
            $table->string('payerid');
            $table->string('status',50);
            $table->decimal('amount');
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
        Schema::dropIfExists('booking_transactions');
    }
};
