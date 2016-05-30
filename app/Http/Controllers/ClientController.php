<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Nicolaslopezj\Searchable\SearchableTrait;
use Postcode;

class ClientController extends Controller
{
    function showClient($client) {
        return view('client.single', ["client" => Client::findOrFail($client)]);
    }

    function showAllClients() {
        return view('client.index', ["client" => Client::paginate(20)]);
    }

    function filterClients($query) {
        return view('client.index', ["client" => (Client::search($query)->get()) ]);
    }

    function createClient(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2|max:10',
            'firstname' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:clients',
            'address_1' => 'required',
            'address_2' => 'required',
            'city' => 'required',
        ]);

        // $usePostcode = $request->input('usePostcode') == 'on' ? true : false;

        $address_array = array($request->input('address_1'), $request->input('address_2'), $request->input('address_3'), $request->input('town'), $request->input('city'), $request->input('county'), $request->input('postcode'), $request->input('country'));
        $address_string = implode(' ', $address_array);
        $address = $latitude = $longitude = null;

        $address = $usePostcode ? Postcode::lookup($request->input('postcode')) : Postcode::getCoordinates($address_string);
        if (!empty($address)) {
            $latitude = $address['latitude'];
            $longitude = $address['longitude'];
        }
        else {
            $validator->after(function($validator) {
                $validator->errors()->add('postcode-fail', 'The address you enetered is invalid or outside of the region we operate in.');
            });
        }

        if ($validator->fails()) {
            return redirect('client/create')
                ->withErrors($validator)
                ->withInput();
        }

        try {
    	   Client::firstOrCreate(array(
                'title'     => $request->input('title'),
                'firstname' => $request->input('firstname'),
                'surname'   => $request->input('surname'),
                'address_1' => $request->input('address_1'),
                'address_2' => $request->input('address_2'),
                'address_3' => $request->input('address_3'),
                'town'      => $request->input('town'),
                'city'      => $request->input('city'),
                'county'    => $request->input('county'),
                'postcode'  => $request->input('postcode'),
                'country'   => $request->input('country'),
                'lat'       => $latitude,
                'lng'       => $longitude,
                'zoom'      => $request->input('zoom'),
                'email'     => $request->input('email'),
                'landline'  => $request->input('landline'),
                'mobile'    => $request->input('mobile'),
            ));
           return view('client.success');
        }
        catch (Exception $e) { 
            return view('client.create', ["e" => $e]);
        }
    }
}
