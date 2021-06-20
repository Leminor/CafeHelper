<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->integer('bonus_card')->unsigned()->nullable()->unique();
            $table->enum('contacts', ['phone', 'e-mail'])->nullable();
            $table->string('contact')->nullable()->unique();
            $table->text('description')->nullable();
            $table->bigInteger('creator_id')->unsigned()->nullable(false);
            $table->bigInteger('updater_id')->unsigned()->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('clients');
    }
}
