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
        Schema::create('vehicle_infos', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->enum('type',['1','2','3'])->comment('1 => Highlights , 2 => Includes , 3 => Warning')->index('idx_type');
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
        Schema::dropIfExists('vehicle_infos');
    }
};
