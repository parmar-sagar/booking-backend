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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index('idx_user_id');
            $table->string('name', 50);
            $table->string('mobile', 10);
            $table->string('alternate_mobile', 10)->nullable();
            $table->mediumInteger('pincode');
            $table->string('locality', 10);
            $table->text('address');
            $table->string('state', 50);
            $table->string('city', 50);
            $table->string('landmark', 50)->nullable();
            $table->string('house_no', 50);
            $table->enum('type', ['home','work','other'])->default('home');
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
        Schema::dropIfExists('addresses');
    }
};
