<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string("firstname",30);
            $table->string("lastname",30);
            $table->string("gender",6);
            $table->string("email")->nullable();
            $table->string("mobile");
            $table->string("note");
            $table->date("event_date");
            $table->time("event_time");
            $table->integer("status_id")->unsigned();
            // $table->integer("branch_id")->unsigned();
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
        Schema::drop('bookings');
    }
}
