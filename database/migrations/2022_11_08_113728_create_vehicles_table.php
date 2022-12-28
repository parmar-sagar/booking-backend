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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('random_id')->unsigned();
            $table->unsignedBigInteger('tour_id')->index('idx_tour_id');
            $table->string('name', 100);
            $table->string('short_name', 20);
            $table->longText('description');
            $table->string('time_ids', 100);
            $table->string('includes_ids', 100);
            $table->string('warning_ids', 100);
            $table->string('highlight_ids', 100);
            $table->string('activities_ids', 100);
            $table->string('additional_info_ids', 100);
            $table->string('banner_img', 100);
            $table->string('image', 100);
            $table->integer('no_of_persons');
            $table->integer('sequence')->default(0);
            $table->longText('tour_itenary');
            $table->string('pickup_time', 100)->nullable();
            $table->string('dropoff_time', 100)->nullable();
            $table->integer('discount')->nullable()->comment('Discount in percentage');
            $table->enum('is_deals',['0','1'])->default(0);
            $table->enum('status',['0','1'])->default(1)->comment('0 => Deactive , 1 => Active')->index('idx_status');
            $table->enum('type',['Tour','Safari'])->default('Tour');
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
        Schema::dropIfExists('vehicles');
    }
};
