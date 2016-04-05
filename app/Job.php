<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{	
	protected $dates = ['deleted_at'];
	protected $fillable = array('client_title' ,'client_firstname' ,'client_surname' ,'address_1' ,'address_2' ,'town' ,'city' ,'postcode' ,'quote' ,'email' ,'landline' ,'mobile');
}
