<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    function createRole(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2'
        ]);

        if ($validator->fails()) {
            return redirect('role/create')
                ->withErrors($validator)
                ->withInput();
        }

        try {
    	   Role::firstOrCreate(array(
                'title'     => $request->input('title'),
            ));
           return view('role.success');
        }
        catch (Exception $e) { 
            return view('role.create', ["e" => $e]);
        }
    }
}
