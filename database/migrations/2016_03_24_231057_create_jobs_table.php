<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) { 
            $table->increments('id');
            $table->timestamps();
            $table->string('client_image');
            $table->string('client_title');
            $table->string('client_firstname');
            $table->string('client_surname');
            $table->string('address_1');
            $table->string('address_2');
            $table->string('town');
            $table->string('city');
            $table->string('postcode');
            $table->string('pertner_id');
            $table->text('description');
            $table->string('type_id');
            $table->string('quote');
            $table->string('email');
            $table->string('landline');
            $table->string('mobile');
            $table->string('gallery_id');
            $table->double('location_x');
            $table->double('location_y');
            $table->double('location_z');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('jobs');
    }
}
