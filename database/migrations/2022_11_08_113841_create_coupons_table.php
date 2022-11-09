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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('code', 50);
            $table->longText('description');
            $table->string('image', 50);
            $table->enum('type', ['0','1'])->default(0)->comment('0 => flat , 1 => percentage');
            $table->enum('status',['0','1'])->default(1)->comment('0 => deactive , 1 => active');
            $table->datetime('expiry_dateTime');
            $table->softDeletes();
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
        Schema::dropIfExists('coupons');
    }
};
