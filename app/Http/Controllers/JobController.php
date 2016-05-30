<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests;
use App\Job;
use App\JobClient;
use App\Jobs\GetLocationImage;
use Illuminate\Http\Request;
use Validator; 
use Postcode;

class JobController extends Controller
{
    function showJob($job) {
    	return view('job.single', ["job" => Job::find($job)]);
    }

    function showAllJobs() {
        return view('job.index', ["job" => Job::paginate(20)]);
    }

    function showJobMap() {
        return view('job.map', ["job" => Job::all()]);
    }

    function showJobMapAjax() {
        $jobs = array();
        foreach (Job::all() as $job) {
            $content = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis fuga at omnis tenetur deleniti nihil sed eum blanditiis itaque qui est quas voluptas praesentium, ab voluptatem iure totam tempore similique!';
            $address_array = array($job->address_1, $job->address_2, $job->address_3, $job->town, $job->city, $job->county, $job->postcode, $job->country);
            $address_string = implode(' ', $address_array);
            array_push($jobs, array(
                "content" => $content,
                "title" => $address_string,
                "lat" => $job->lat,
                "lng" => $job->lng
            ));
        }
        return $jobs;
    }

    function createJob(Request $request) {        
        $validator = Validator::make($request->all(), [
            'client' => 'required',
            'quote' => 'required',
            'date' => 'required',
            'job_type' => 'required',
        ]);

        $address_array = array($request->input('address_1'), $request->input('address_2'), $request->input('address_3'), $request->input('town'), $request->input('city'), $request->input('county'), $request->input('postcode'), $request->input('country'));
        $address_string = implode(' ', $address_array);
        $address = $latitude = $longitude = null;

        $address = Postcode::getCoordinates($address_string);
        if (!empty($address)) {
            $latitude = $address['latitude'];
            $longitude = $address['longitude'];
        }
        else {
            $validator->after(function($validator) {
                $validator->errors()->add('postcode-fail', 'The address you enetered is invalid or outside of the region we operate in.');
            });
        }

        if ($validator->fails()) {
            return redirect('job/create')
                ->withErrors($validator)
                ->withInput();
        }

        try {
    	   $job = Job::create(array(
                'primary_role' => $request->input('client')[0],
                'address_1' => $request->input('address_1'),
                'address_2' => $request->input('address_2'),
                'address_3' => $request->input('address_3'),
                'town' => $request->input('town'),
                'date' => $request->input('date'),
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
                'lat' => $latitude,
                'lng' => $longitude,
                'zoom' => $request->input('zoom'),
                'job_type' => $request->input('job_type')
            ));

            foreach ($request->input('client') as $client) {
                JobClient::create([
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
