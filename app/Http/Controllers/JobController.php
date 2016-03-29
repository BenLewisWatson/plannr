<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    function createJob() {
    	Job::firstOrCreate();
    }
}
