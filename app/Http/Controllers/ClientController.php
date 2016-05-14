<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Validator;

use App\Http\Requests;

use App\Client;

class ClientController extends Controller
{
    function showClient($client) {
        return view('client.single', ["client" => Client::findOrFail($client)]);
    }

    function showAllClients() {
        return view('client.index', ["client" => Client::paginate(20)]);
    }

    function createClient(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2|max:10',
            'surname' => 'required',
            'mobile' => 'integer',
            'email' => 'email|unique:clients',
            'address_1' => 'required',
            'address_2' => 'required',
            'city' => 'required',
            'postcode' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('client/create')
                ->withErrors($validator)
                ->withInput();
        }

        try {
    	   Client::firstOrCreate(array(
                'title' => $request->input('title'),
                'firstname' => $request->input('firstname'),
                'surname' => $request->input('surname'),
                'address_1' => $request->input('address_1'),
                'address_2' => $request->input('address_2'),
                'address_3' => $request->input('address_3'),
                'town' => $request->input('town'),
                'city' => $request->input('city'),
                'county' => $request->input('county'),
                'postcode' => $request->input('postcode'),
                'country' => $request->input('country'),
                'email' => $request->input('email'),
                'landline' => $request->input('landline'),
                'mobile' => $request->input('mobile'),
                'lat' => $request->input('lat'),
                'lng' => $request->input('lng'),
                'zoom' => $request->input('zoom')
            ));
           return view('client.success');
        }
        catch (Exception $e) { 
            return view('client.create', ["e" => $e]);
        }
    }
}
