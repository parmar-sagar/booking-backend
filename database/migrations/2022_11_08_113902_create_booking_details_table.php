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
            $table->unsignedBigInteger('booking_id')->index('booking_id');
            $table->string('name', 50);
            $table->string('image', 50);
            $table->decimal('price');
            $table->integer('qty')->default(1);
            $table->timestamp('created_at')->useCurrent()->index('created_at');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate()->index('updated_at');
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
