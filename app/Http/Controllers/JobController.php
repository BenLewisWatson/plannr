<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    	   // Job::firstOrCreate();
           return view('job.success');
        } catch (Exception $e) { 
            return view('job.create', ["e" => $e]);
        }
    }
}
