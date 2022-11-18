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
            $table->unsignedBigInteger('tour_id')->index('idx_tour_id');
            $table->string('name', 100);
            $table->string('short_name', 20);
            $table->longText('description');
            $table->string('time_ids', 100);
            $table->string('includes_ids', 100);
            $table->string('warning_ids', 100);
            $table->string('highlight_ids', 100);
            $table->string('activities_ids', 100);
            $table->string('banner_img', 100);
            $table->string('image', 100);
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
