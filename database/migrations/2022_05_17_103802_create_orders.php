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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
			$table->string('email');
            $table->string('recipient_phone');
            $table->string('recipient_name');
            $table->text('comment');
            $table->string('delivery_type');
            $table->string('delivery_city');
            $table->string('delivery_street');
            $table->string('delivery_bldng');
            $table->string('delivery_house');
            $table->string('delivery_room');
            $table->string('delivery_time');
            $table->string('payment_type');
            $table->string('full_price');
            $table->boolean('is_paid');
            $table->boolean('is_complite');
            $table->timestamps();
        });   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};