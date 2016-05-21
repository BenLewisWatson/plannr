<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = [
		'title'
    ];

    public function job() {
    	$this->belongsTo('\app\JobClient');
    }
}
