<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('orders', function (Blueprint $table) {
          $table->increments('id');
          $table->string('random')->unique();
          $table->integer('user_id')->unsigned()->nullable();
          $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('set null');
          $table->string('billing_email');
          $table->string('billing_name');
          $table->string('billing_address');
          $table->string('billing_city');
          $table->string('billing_province');
          $table->string('billing_postalcode');
          $table->string('billing_phone');
          $table->string('billing_name_on_card')->nullable();
          $table->float('billing_discount')->nullable();
          $table->string('billing_discount_code')->nullable();
          $table->float('billing_subtotal')->nullable();
          $table->float('billing_tax')->nullable();
          $table->float('billing_total')->nullable();
          $table->string('payment_gateway');
          $table->boolean('shipped')->default(false);
          $table->string('status')->default('pending');
          $table->string('source')->nullable();
          $table->string('error')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
