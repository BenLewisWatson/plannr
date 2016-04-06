<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\GetLocationImage;
use Validator;

use App\Http\Requests;

use App\Job;

class JobController extends Controller
{
    function showJob($job) {
    	return view('job.single', ["job" => Job::find($job)]);
    }

    function showAllJobs() {
        $job = new GetLocationImage(array("52", "Royston Hill", "East Ardsley", "Wakefield"));
        return view('job.map', ["job" => $job]);
    	// return view('job.index', ["job" => Job::paginate(20)]);
    }

    function createJob(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'surname' => 'required',
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('job/create')
                ->withErrors($validator)
                ->withInput();
        }

        try {
    	   Job::firstOrCreate(array(
                'client_title' => $request->input('title'),
                'client_firstname' => $request->input('first_name'),
                'client_surname' => $request->input('surname'),
                // 'partner' => $request->input('partner'),
                'address_1' => $request->input('address_1'),
                'address_2' => $request->input('address_2'),
                // 'address_3' => $request->input('address_3'),
                'town' => $request->input('town'),
                'city' => $request->input('city'),
                'postcode' => $request->input('postcode'),
                // 'pertner_id' => $request->input('pertner_id'),
                // 'description' => $request->input('description'),
                // 'type_id' => $request->input('type_id'),
                'quote' => $request->input('quote'),
                'email' => $request->input('email'),
                'landline' => $request->input('landline'),
                'mobile' => $request->input('mobile'),
                // 'gallery_id' => $request->input('gallery_id'),
                // 'location_x' => $request->input('location_x'),
                // 'location_y' => $request->input('location_y'),
                // 'location_z' => $request->input('location_z')
            ));
           return view('job.success');
        }
        catch (Exception $e) { 
            return view('job.create', ["e" => $e]);
        }
    }
}
