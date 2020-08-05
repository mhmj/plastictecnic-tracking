<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->unsignedBigInteger('category_id')->index()->nullable();
            $table->string('name')->nullable();
            $table->string('size')->nullable();
            $table->string('description')->nullable();
            $table->string('color')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('category');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type');
    }
}
