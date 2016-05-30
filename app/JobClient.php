<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobClient extends Model
{
    protected $fillable = [
		'title','client_id','job_id'
    ];

    public function job() {
    	return $this->belongsTo('\app\Job');
    }

    public function client() {
    	return $this->hasOne('\app\Client');
    }

    public function role() {
    	return $this->hasOne('\app\Role');
    }
}
