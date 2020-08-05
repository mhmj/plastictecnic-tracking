<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipment', function (Blueprint $table) {
            $table->id();
            $table->string('delivery_no')->nullable();
            $table->unsignedBigInteger('company_id')->index()->nullable();
            $table->string('vehicle_no')->nullable();
            $table->string('created_by')->nullable();
            $table->string('verified_by')->nullable();
            $table->string('delivery_by')->nullable();
            $table->string('remark')->nullable();
            $table->string('remark_2')->nullable();
            $table->string('status')->nullable();
            $table->longText('image')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('company');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipment');
    }
}
