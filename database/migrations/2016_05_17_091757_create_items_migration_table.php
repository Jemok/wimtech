<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsMigrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name');
            $table->integer('item_quantity')->unsigned();
            $table->decimal('item_price');
            $table->decimal('total');
            $table->integer('customer_id')->unsigned()->index();

            $table->foreign('customer_id')
                  ->references('id')
                  ->on('customers');

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
        Schema::drop('items');
    }
}
