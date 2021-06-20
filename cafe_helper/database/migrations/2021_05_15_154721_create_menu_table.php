<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('menu_group')->unsigned()->nullable(false);
            $table->bigInteger('meal_id')->unsigned()->nullable(false);
            $table->float('price')->unsigned()->nullable(false);
            $table->string('description')->nullable();
            $table->bigInteger('creator_id')->unsigned()->nullable(false);
            $table->bigInteger('updater_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('menu_group')->references('id')->on('menu_groups')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('meal_id')->references('id')->on('products')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('creator_id')->references('id')->on('staff')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('updater_id')->references('id')->on('staff')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
