<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductWishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_wish', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('product_id')->unsigned()->nullable();
          $table->foreign('product_id')->references('id')
                ->on('products')->onUpdate('cascade')->onDelete('set null');

          $table->integer('wish_id')->unsigned()->nullable();
          $table->foreign('wish_id')->references('id')
              ->on('wishes')->onUpdate('cascade')->onDelete('set null');

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
        Schema::dropIfExists('product_wish');
    }
}
