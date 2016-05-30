<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    function handleQuery(Request $request) {
        return redirect()->action('ClientController@showClient', $request->input('header_search_input'));
    }
}
