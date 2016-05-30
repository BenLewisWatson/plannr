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
            // General
            $table->increments('id');
            $table->string('title');
            $table->binary('image');
            $table->timestamp('date');
            // Job Roles and Types
            $table->string('primary_role');
            $table->string('job_type');
            // Content
            $table->text('description');
            $table->string('gallery_id');
            $table->double('quote');
            // Contact Information
            $table->string('landline');
            $table->string('mobile');
            $table->string('email');
            // Address Information
            $table->string('address_1');
            $table->string('address_2');
            $table->string('address_3');
            $table->string('town');
            $table->string('city');
            $table->string('county');
            $table->string('postcode');
            $table->string('country');
            // Geociding Information
            $table->string('lat');
            $table->string('lng');
            $table->string('zoom');
            // Timestamps
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
        Schema::drop('jobs');
    }
}
