<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GetLocationImage extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $key = 'AIzaSyANjWsTkK3fNrrdWI5CemHQEOpkChVVgUg';

    /**
     * Location
     * @var [type]
     */
    private $location;

    /**
     * The data returned by Google API
     * @var json
     */
    private $data;

    /**
     * Create a new job instance.
     *
     * @param array $locationenter cordinates or location string
     *  
     * @return void
     */
    public function __construct(array $location)
    {
        $this->location = $location;

    }

    public function isAddressString() {
        foreach ($this->location as $a) {
            if(!is_numeric($a)) {
                return true;
            }
        }
    }

    public function getData() {
        $query = 'http://maps.googleapis.com/maps/api/geocode/json?';
        if ($this->isAddressString()) {
            $query .= 'address='.implode(' ', $this->location);
        }
        else {
            $query .= 'latlng='.implode(' ', $this->location).'&sensor=true';
        }
        $query = urlencode($query);
        $request = json_decode(file_get_contents($query));
        $this->data = $request;
        return $request;
    }

    public function getLatLng() {
        return $this->data->geometry->location;
    }

    public function getLat() {
        return $this->data->geometry->location->lat;
    }

    public function getLng() {
        return $this->data->geometry->location->lng;
    }

    public function render($type = 'map') {
        if ($type == 'map') {
            $query = 'http://maps.googleapis.com/maps/api/staticmap?latlng='.$this->getLng().'&lng='.$this->getLng().'zoom=13&size=600x300&maptype=roadmap&key='.$this->key;

            return true;
        }
        else if ($type == 'street') {

            return true;
        }
        return false;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
