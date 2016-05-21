<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests;
use App\Job;
use App\JobClient;
use App\Jobs\GetLocationImage;
use Illuminate\Http\Request;
use Validator;

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
            // 'first_name' => 'required',
            // 'surname' => 'required',
            // 'title' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('job/create')
                ->withErrors($validator)
                ->withInput();
        }

        try {
    	   $job = Job::firstOrCreate(array(
                'primary_role' => $request->input('client')[0],
                'address_1' => $request->input('address_1'),
                'address_2' => $request->input('address_2'),
                'address_3' => $request->input('address_3'),
                'town' => $request->input('town'),
                'city' => $request->input('city'),
                'county' => $request->input('county'),
                'postcode' => $request->input('postcode'),
                'country' => $request->input('country'),
                'description' => $request->input('description'),
                'quote' => $request->input('quote'),
                'email' => $request->input('email'),
                'landline' => $request->input('landline'),
                'mobile' => $request->input('mobile'),
                'lat' => $request->input('lat'),
                'lng' => $request->input('lng'),
                'zoom' => $request->input('zoom'),
                'job_type' => $request->input('job_type')
            ));

            foreach ($request->input('client') as $client) {
                JobClient::firstOrCreate([
                    'job_id' => $job->id,
                    'client_id' => $client
                ]);
            }

           return view('job.success');
        }
        catch (Exception $e) { 
            return view('job.create', ["e" => $e]);
        }
    }
}
