<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jobs\GetLocationImage as GetLocationImage;

class Job extends Model
{
	protected $dates = ['deleted_at'];
	protected $fillable = array('title', 'image', 'date', 'primary_role', 'job_type', 'address_1', 'address_2', 'town', 'city', 'postcode', 'quote', 'email', 'landline', 'mobile', 'lat', 'lng');

	public function clients() {
		return $this->belongsToMany('App\Client', 'job_clients');
	}

	public function getImage() {
		if (!empty($this->lat) && !empty($this->lng)) {
			$img = new GetLocationImage(array($this->lat, $this->lng));
			return $img->data;
		}
		return false;
	}
}

