<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobClient extends Model
{
    protected $fillable = [
		'title','client_id','job_id'
    ];

    public function job() {
    	$this->belongsTo('\app\Job');
    }

    public function client() {
    	$this->hasOne('\app\Client');
    }

    public function role() {
    	$this->hasOne('\app\Role');
    }
}
