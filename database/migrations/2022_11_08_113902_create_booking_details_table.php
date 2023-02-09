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
        Schema::create('booking_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id')->index('idx_booking_id');
            $table->unsignedBigInteger('vehicle_id')->index('idx_vehicle_id');
            $table->string('name', 50);
            $table->decimal('price');
            $table->date('booking_date');
            $table->string('booking_time');
            $table->tinyInteger('quantity')->default(1);
            $table->longText('extra_product')->nullable();
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
        Schema::dropIfExists('booking_details');
    }
};
