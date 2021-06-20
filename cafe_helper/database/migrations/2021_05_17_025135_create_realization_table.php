<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realization', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->unsigned()->nullable(false);
            $table->bigInteger('client_id')->unsigned()->nullable(false);
            $table->bigInteger('product_id')->unsigned()->nullable(false);
            $table->float('amount')->unsigned()->nullable(false);
            $table->float('price')->unsigned()->nullable(false);
            $table->text('description')->nullable();
            $table->bigInteger('warehouse_id')->unsigned()->nullable(false);
            $table->bigInteger('creator_id')->unsigned()->nullable(false);
            $table->bigInteger('updater_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onUpdate('CASCADE')->onDelete('RESTRICT');
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
        Schema::dropIfExists('realization');
    }
}
