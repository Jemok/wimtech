<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrandTotalTableMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grand_total', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('grand_total')->unsigned();
            $table->integer('customer_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('customer_id')
                  ->references('id')
                  ->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('grand_total');
    }
}
