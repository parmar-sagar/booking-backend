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
            $table->string('random_id',100);
            $table->string('name', 50);
            $table->string('code', 50);
            $table->longText('description');
            $table->string('image', 50);
            $table->tinyInteger('type')->default(0)->comment('0 => flat , 1 => percentage');
            $table->decimal('amount', '10','2');
            $table->tinyInteger('status')->default(1)->comment('0 => deactive , 1 => active')->index('idx_status');
            $table->datetime('expiry_date');
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
        Schema::dropIfExists('coupons');
    }
};
