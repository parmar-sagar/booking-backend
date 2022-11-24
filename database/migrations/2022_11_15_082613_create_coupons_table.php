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
            $table->string('name', 100);
            $table->string('code', 100);
            $table->longText('description');
            $table->decimal('ammount');
            $table->string('image', 100);
            $table->enum('type', ['0','1'])->default(0)->comment('0 => flat , 1 => percentage');
            $table->enum('status',['0','1'])->default(1)->comment('0 => deactive , 1 => active')->index('idx_status');
            $table->date('expiry_date');
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
