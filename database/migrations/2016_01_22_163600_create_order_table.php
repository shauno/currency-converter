<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
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
            $table->string('currency_from');
            $table->string('currency_to');
            $table->double('rate');
            $table->decimal('amount_paid', 10, 2);
            $table->decimal('amount_bought', 10, 2);
            $table->decimal('amount_surcharge', 10, 2);
            $table->decimal('amount_discount', 10, 2);
            $table->decimal('amount_total', 10, 2);
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
        Schema::drop('orders');
    }
}
