<?php

use Illuminate\Database\Seeder;
use App\Job;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$i = 0;
    	while ($i <= 100) {
	    	Job::create([
				"client_title" => "Mr fake",
				"location_x"   => 1,
				"location_y"   => 1,
				"location_z"   => 1,
        	]);	
    		$i++;
    	}
        
    }
}
