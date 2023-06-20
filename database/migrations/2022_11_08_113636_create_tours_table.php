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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('random_id')->unsigned();
            $table->string('name', 255);
            $table->longText('description');
            $table->integer('min_age');
            $table->string('convoy_leader',100);
            $table->string('tour_guide',100);
            $table->string('pickup_and_drop',100);
            $table->string('time_ids');
            $table->integer('location_id');
            $table->string('safety_gear_ids');
            $table->string('refreshments_ids');
            $table->integer('sequence')->default(0);
            $table->tinyInteger('status')->default(1)->comment('0 => Deactive , 1 => Active')->index('idx_status');
            $table->string('image', 100);
            $table->string('banner_img', 100);
            $table->tinyInteger('on_home')->default(0);
            $table->integer('on_home_sequence')->default(0);
            $table->enum('type',['Tour','Safari'])->default('Tour');
            $table->string('voucher',250);
            $table->tinyInteger('voucher_status')->default(0)->comment('0 => Deactive , 1 => Active')->index('idx_voucher_status');
            $table->datetime('voucher_expiry_date');
            $table->string('security_code',250);
            //availability and option 1 to 6 are newly added on 07/06/2023
            $table->string('availability',255);
            $table->string('option1',255);
            $table->string('option2',255);
            $table->string('option3',255);
            $table->string('option4',255);
            $table->string('option5',255);
            $table->string('option6',255);
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
        Schema::dropIfExists('tours');
    }
};
