<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title')->unique();
          $table->text('short_description');
          $table->text('description');
          $table->string('screen_size');
          $table->string('item_dimensions');
          $table->string('screen_weight');
          $table->integer('model_year');
          $table->string('resolution');
          $table->integer('total_hdmi_ports');
          $table->integer('price');
          $table->boolean('featured')->unsigned()->nullable();
          $table->integer('rate')->nullable();
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
        Schema::dropIfExists('products');
    }
}
