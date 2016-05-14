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
        return view('job.index', ["job" => Job::paginate(20)]);
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
                'job_type' => $request->input('job_type'),
                'primary_role' => $request->input('primary_role'),
                'address_1' => $request->input('address_1'),
                'address_2' => $request->input('address_2'),
                'address_3' => $request->input('address_3'),
                'town' => $request->input('town'),
                'city' => $request->input('city'),
                'county' => $request->input('county'),
                'postcode' => $request->input('postcode'),
                'country' => $request->input('country'),
                'description' => $request->input('description'),
                'type_id' => $request->input('type_id'),
                'quote' => $request->input('quote'),
                'email' => $request->input('email'),
                'landline' => $request->input('landline'),
                'mobile' => $request->input('mobile'),
                'lat' => $request->input('lat'),
                'lng' => $request->input('lng'),
                'zoom' => $request->input('zoom')
            ));
           return view('job.success');
        }
        catch (Exception $e) { 
            return view('job.create', ["e" => $e]);
        }
    }
}
