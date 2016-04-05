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
            $table->strin,g('address_2');
            $table->string('town')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode');
            $table->string('pertner_id')->nullable();
            $table->text('description')->nullable();
            $table->string('type_id')->nullable();
            $table->string('quote')->nullable();
            $table->string('email')->nullable();
            $table->string('landline')->nullable();
            $table->string('mobile')->nullable();
            $table->string('gallery_id')->nullable();
            $table->double('location_x')->nullable();
            $table->double('location_y')->nullable();
            $table->double('location_z')->nullable();
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
