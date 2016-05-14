<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $dates = ['deleted_at'];
	protected $fillable = array('title','firstname','surname','address_1','address_2','address_3','town','city','county','postcode','country','mobile','landline','email','lat','lng','zoom','partner_id');
}