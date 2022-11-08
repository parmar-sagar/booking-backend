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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo', 50);
            $table->string('title', 50);
            $table->string('email', 50)->index();
            $table->string('mobile', 10)->index();
            $table->text('address', 250);
            $table->longText('terms_conitions')->nullable();
            $table->longText('privacy_policy')->nullable();
            $table->longText('refund_policy',)->nullable();
            $table->text('faqs')->nullable();
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
