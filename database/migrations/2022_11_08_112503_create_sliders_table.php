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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['0','1'])->default(0)->comment('0 => Image , 1 => Video')->index('idx_type');
            $table->string('image_video', 100);
            $table->text('link')->nullable();
            $table->enum('status',['0','1'])->default(1)->comment('0 => deactive , 1 => active')->index('idx_status');
            $table->integer('sequence')->default(1);
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
        Schema::dropIfExists('sliders');
    }
};
