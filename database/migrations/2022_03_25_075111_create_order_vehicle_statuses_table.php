<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderVehicleStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_vehicle_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('depot_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('depot_id')->references('id')->on('depots');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('order_vehicle_statuses');
    }
}
