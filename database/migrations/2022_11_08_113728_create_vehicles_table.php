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
            $table->enum('type',['Tour','Safari'])->default('Tour');
            $table->unsignedBigInteger('tour_id')->index('idx_tour_id');
            $table->string('name', 255);
            $table->string('short_name', 20);
            $table->longText('description');
            $table->integer('no_of_persons');
            $table->string('includes_ids');
            $table->string('highlight_ids');
            $table->string('warning_ids');
            $table->string('activities_ids');
            $table->string('additional_info_ids');
            $table->longText('tour_itenary');
            $table->integer('quantity')->default(0);
            $table->integer('available_quantity')->default(0);
            $table->tinyInteger('status')->default(1)->comment('0 => Deactive , 1 => Active')->index('idx_status');
            $table->string('banner_img', 100);
            $table->string('image', 100);
            $table->integer('sequence')->default(0);
            $table->string('pickup_time', 100)->nullable();
            $table->string('dropoff_time', 100)->nullable();
            $table->integer('discount')->default(0)->comment('Discount in percentage');
            $table->tinyInteger('is_deals')->default(0);  
            // pickup_status newly added coloumn
            $table->tinyInteger('pickup_status')->default(0);
            // disc newly added coloumn
            $table->Integer('disc')->default(0);   
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
