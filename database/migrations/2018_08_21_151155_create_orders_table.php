<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
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
            $table->string('code')->unique();
            $table->string('full_name');
            $table->text('address');
            $table->integer('city_id')->unsigned();
            $table->integer('province_id')->unsigned();
            $table->string('postal_code');
            $table->string('phone');
            $table->string('delivery_service');
            $table->decimal('shipping_cost', 8, 0);
            $table->decimal('subtotal', 8, 0);
            $table->integer('user_id')->unsigned();
            $table->integer('order_status_id')->unsigned()->default(1);
            $table->string('resi_number')->nullable();
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('order_status_id')->references('id')->on('order_statuses');
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
}
