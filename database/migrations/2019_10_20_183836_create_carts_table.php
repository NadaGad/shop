<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id');
            $table->string('title');
            $table->text('description');
            $table->double('price');
            $table->double('quantity');
            $table->double('total');
            $table->double('discount')->default(0);
            $table->bigInteger('user_id');
            $table->boolean('confirmed')->default(false);
            $table->bigInteger('order_id')->nullable();
            $table->bigInteger('userorder_num')->nullable();
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
        Schema::dropIfExists('carts');
    }
}
