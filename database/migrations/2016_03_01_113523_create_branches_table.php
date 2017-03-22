<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('contact_no')->nullable;
            $table->string('email')->nullable;
            $table->timestamps();
        });

        $branch = [
            'name' => 'None',
            'address' => 'n/a',
            'contact_no' => '',
            'email' => ''
        ];

        \App\Branch::create($branch);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('branches');
    }
}
