<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movement', function (Blueprint $table) {
            $table->id();
            $table->string('type_name')->nullable();
            $table->string('packaging_no')->nullable();
            $table->string('deliver_no')->nullable();
            $table->unsignedBigInteger('shipment_id')->index()->nullable();
            $table->string('status')->nullable();
            $table->string('remark')->nullable();
            $table->string('remark_2')->nullable();
            $table->longText('image')->nullable();
            $table->timestamps();

            $table->foreign('shipment_id')->references('id')->on('shipment');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movement');
    }
}
