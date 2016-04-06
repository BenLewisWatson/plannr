<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GetLocationImage extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $key = 'AIzaSyC_QDIIVFCWhNpOZrzxp1D2gMo5r18v6r8';

    /**
     * Location
     * @var [type]
     */
    public $location;

    /**
     * The data returned by Google API
     * @var json
     */
    public $data;

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
        $this->setData();
    }

    public function isAddressString() {
        foreach ($this->location as $a) {
            if(!is_numeric($a)) {
                return true;
            }
        }
    }

    public function getData() {
        $query = 'https://maps.googleapis.com/maps/api/geocode/json?';
        if ($this->isAddressString()) {
            $query .= 'address='.urlencode(implode('+,', $this->location));
        }
        else {
            $query .= 'latlng='.urlencode(implode('+,', $this->location)).'&sensor=true';
        }
        $query = $query.'&key='.$this->key;
    
        $request = curl_init($query);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($request);   

        if(curl_getinfo($request, CURLINFO_HTTP_CODE) !== 200) {
            echo curl_error($request);
        }
        else {
            curl_close($request);
            return json_decode($output);
        }
    }

    public function setData() {
        $this->data = $this->getData();
    }

    public function getLatLng() {
        return $this->getLat().','.$this->getLng();
    }

    public function getLat() {
        return $this->data->results[0]->geometry->location->lat;
    }

    public function getLng() {
        return $this->data->results[0]->geometry->location->lng;
    }

    public function render($type = 'map') {
        if ($type == 'map') {
            $query = 'http://maps.googleapis.com/maps/api/staticmap?center='.$this->getLatLng().'&zoom=15&size=600x600&maptype=roadmap';
            echo '<img src="'.$query.'">';
        }
        else if ($type == 'street') {

        }
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
