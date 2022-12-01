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
            $table->string('name', 100);
            $table->string('image', 100);
            $table->string('banner_img', 100);
            $table->longText('description');
            $table->string('time_ids', 100);
            $table->enum('status',['0','1'])->default(1)->comment('0 => Deactive , 1 => Active')->index('idx_status');
            $table->tinyInteger('on_home')->default(0);
            $table->Integer('on_home_sequence')->default(0);
            $table->enum('type',['Tour','Safari'])->default('Tour');
            $table->Integer('safari_sequence')->default(0);
            $table->string('location_id', 100);
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
