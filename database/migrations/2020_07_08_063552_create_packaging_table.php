<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packaging', function (Blueprint $table) {
            $table->id();
            $table->string('type_name')->nullable();
            $table->unsignedBigInteger('category_id')->index()->nullable();
            $table->string('packaging_no')->nullable();
            $table->string('status')->nullable();
            $table->string('remark')->nullable();
            $table->string('remark_2')->nullable();
            $table->longText('image')->nullable();
            $table->unsignedBigInteger('company_id')->index()->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('category');
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
        Schema::dropIfExists('packaging');
    }
}
