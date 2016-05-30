<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Role extends Model
{
    use SearchableTrait;

	protected $fillable = [
		'title'
    ];

    public function job() {
    	$this->belongsTo('\app\JobClient');
    }

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'title' => 10,
        ],
    ];
}
