<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests;
use App\Job;
use App\Role;
use Excel;
use Illuminate\Http\Request;
use Nicolaslopezj\Searchable\SearchableTrait;

class APIController extends Controller
{
    function filterClients($query, Request $request) {
        $pagination = $request->input('pagination', 10);
        return Client::search($query)->take($pagination)->get();
    }

    function filterRoles($query, Request $request) {
        $pagination = $request->input('pagination', 10);
        return Role::search($query)->take($pagination)->get();
    }

    function import() {
        return view('import');
    }

    function exportXLS() {
        Excel::create('Plannr', function($excel) {
            // Set the title
            $excel->setTitle('Plannr');
            // Chain the setters
            $excel->setCreator('Plannr')
                  ->setCompany('Plannr');

            $excel->sheet('Jobs', function($sheet) {
                $sheet->setStyle(array(
                    'font' => array(
                        'name'      =>  'Calibri',
                        'size'      =>  15,
                    )
                ));

                $jobs = Job::all();
                $i=1;
                // Title
                $sheet->row($i, array(
                    'Id',
                    'Type',
                    'Quote',
                    'Address 1',
                    'Address 2',
                    'Address 3',
                    'Town',
                    'City',
                    'County',
                    'Postcode',
                    'Country',
                    'Landline',
                    'Mobile',
                    'Email',
                ));

                $sheet->row(1, function($row) {
                    $row->setFontColor('#FFFFFF');
                    $row->setBackground('#3a4175');
                    $row->setFontWeight('bold');
                });

                // Rows
                foreach ($jobs as $j) {
                    $i++;
                    $sheet->row($i, array(
                         $j->id,
                         $j->type,
                         $j->quote,
                         $j->address_1,
                         $j->address_2,
                         $j->address_3,
                         $j->town,
                         $j->city,
                         $j->county,
                         $j->postcode,
                         $j->country,
                         $j->landline,
                         $j->mobile,
                         $j->email,
                    ));
                }
            });
            
            $excel->sheet('Clients', function($sheet) {
                $sheet->setStyle(array(
                    'font' => array(
                        'name'      =>  'Calibri',
                        'size'      =>  15,
                    )
                ));

                $jobs = Client::all();
                $i=1;
                // Title
                $sheet->row($i, array(
                    'Id',
                    'Title',
                    'Firstname',
                    'Surname',
                    'Address 1',
                    'Address 2',
                    'Address 3',
                    'Town',
                    'City',
                    'County',
                    'Postcode',
                    'Country',
                    'Landline',
                    'Mobile',
                    'Email',
                    'Created',
                    'Updated',
                ));

                $sheet->row(1, function($row) {
                    $row->setFontColor('#FFFFFF');
                    $row->setBackground('#3a4175');
                    $row->setFontWeight('bold');
                });

                // Rows
                foreach ($jobs as $j) {
                    $i++;
                    $sheet->row($i, array(
                         $j->id,
                         $j->title,
                         $j->firstname,
                         $j->surname,
                         $j->address_1,
                         $j->address_2,
                         $j->address_3,
                         $j->town,
                         $j->city,
                         $j->county,
                         $j->postcode,
                         $j->country,
                         $j->landline,
                         $j->mobile,
                         $j->email,
                         $j->crteated_at,
                         $j->updated_at,
                    ));
                }
            });
        })->download('xls');
    }

    function exportCSV() {
        Excel::create('Plannr', function($excel) {
            // Set the title
            $excel->setTitle('Plannr');
            // Chain the setters
            $excel->setCreator('Plannr')
                  ->setCompany('Plannr');

            $excel->sheet('Jobs', function($sheet) {
                $sheet->setStyle(array(
                    'font' => array(
                        'name'      =>  'Calibri',
                        'size'      =>  15,
                    )
                ));

                $jobs = Job::all();
                $i=1;
                // Title
                $sheet->row($i, array(
                    'Id',
                    'Type',
                    'Quote',
                    'Address 1',
                    'Address 2',
                    'Address 3',
                    'Town',
                    'City',
                    'County',
                    'Postcode',
                    'Country',
                    'Landline',
                    'Mobile',
                    'Email',
                ));

                $sheet->row(1, function($row) {
                    $row->setFontColor('#FFFFFF');
                    $row->setBackground('#3a4175');
                    $row->setFontWeight('bold');
                });

                // Rows
                foreach ($jobs as $j) {
                    $i++;
                    $sheet->row($i, array(
                         $j->id,
                         $j->type,
                         $j->quote,
                         $j->address_1,
                         $j->address_2,
                         $j->address_3,
                         $j->town,
                         $j->city,
                         $j->county,
                         $j->postcode,
                         $j->country,
                         $j->landline,
                         $j->mobile,
                         $j->email,
                    ));
                }
            });
            
            $excel->sheet('Clients', function($sheet) {
                $sheet->setStyle(array(
                    'font' => array(
                        'name'      =>  'Calibri',
                        'size'      =>  15,
                    )
                ));

                $jobs = Client::all();
                $i=1;
                // Title
                $sheet->row($i, array(
                    'Id',
                    'Title',
                    'Firstname',
                    'Surname',
                    'Address 1',
                    'Address 2',
                    'Address 3',
                    'Town',
                    'City',
                    'County',
                    'Postcode',
                    'Country',
                    'Landline',
                    'Mobile',
                    'Email',
                    'Created',
                    'Updated',
                ));

                $sheet->row(1, function($row) {
                    $row->setFontColor('#FFFFFF');
                    $row->setBackground('#3a4175');
                    $row->setFontWeight('bold');
                });

                // Rows
                foreach ($jobs as $j) {
                    $i++;
                    $sheet->row($i, array(
                         $j->id,
                         $j->title,
                         $j->firstname,
                         $j->surname,
                         $j->address_1,
                         $j->address_2,
                         $j->address_3,
                         $j->town,
                         $j->city,
                         $j->county,
                         $j->postcode,
                         $j->country,
                         $j->landline,
                         $j->mobile,
                         $j->email,
                         $j->crteated_at,
                         $j->updated_at,
                    ));
                }
            });
        })->download('csv');
    }
}