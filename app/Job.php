<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jobs\GetLocationImage as GetLocationImage;

class Job extends Model
{
	protected $dates = ['deleted_at'];
	protected $fillable = array('client_title' ,'client_firstname' ,'client_surname' ,'address_1' ,'address_2' ,'town' ,'city' ,'postcode' ,'quote' ,'email' ,'landline' ,'mobile', 'location_x', 'location_y');

	public function getImage() {
		$img = new GetLocationImage(array($this->location_x, $this->location_y));
		return $img->render();
	}
}