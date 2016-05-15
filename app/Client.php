<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Client extends Model
{
    use SearchableTrait;

	protected $dates = ['deleted_at'];
	protected $fillable = array('title','firstname','surname','address_1','address_2','address_3','town','city','county','postcode','country','mobile','landline','email','lat','lng','zoom','partner_id');

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'firstname' => 10,
            'surname' => 10,
            'address_1' => 2,
            'address_2' => 2,
            'address_3' => 2,
            'town' => 2,
            'city' => 2,
            'postcode' => 2,
            'email' => 5,
        ],
    ];
}