<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('firstname');
            $table->string('surname');
            $table->string('address_1');
            $table->string('address_2');
            $table->string('address_3')->nullable();
            $table->string('town')->nullable();
            $table->string('city');
            $table->string('county')->nullable();
            $table->string('postcode');
            $table->string('country')->nullable();
            $table->string('mobile');
            $table->string('landline')->nullable();
            $table->string('email')->unique();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('zoom')->nullable();
            $table->integer('partner');
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
        Schema::drop('clients');
    }
}
