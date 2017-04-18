<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string("type",30);     // such as BOOKING, SERVICE status
            $table->string("description");
            $table->timestamps();
        });

        $status = [
            'type' => 'Tentative',
            'description' => 'Tentative'
        ];
        \App\Status::create($status);
        $status = [
            'type' => 'Confirmed',
            'description' => 'Confirmed'
        ];
        \App\Status::create($status);
        $status = [
            'type' => 'No Show',
            'description' => 'No Show'
        ];
        \App\Status::create($status);
        $status = [
            'type' => 'Cancelled',
            'description' => 'Cancelled'
        ];
        \App\Status::create($status);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('statuses');
    }
}
