<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Session;
use Storage;

//requests
use App\Http\Requests\CsvUploadRequest;

class CsvFilesController extends Controller
{
    public function csvToDb($file_name)
    {
    	if(!Storage::disk('public_csv')->exists($file_name))
        {
        	Session::flash('dangerMsg', 'File '.$file_name.' not exist!');
        	return redirect(route('clients.clientsIndex'));
        }

    	$path = Storage::disk('public_csv')->path($file_name);
    	$file = fopen($path, 'r');

    	$i = 1;
    	while (($line = fgetcsv($file)) !== FALSE) 
    	{
    		if($i > 1001)
    		{
    			break;
    		}

    		//simple validation for header
    		if($i == 1)
    		{
    			$error = false;
    			if(count($line) != 5)
    			{
    				$error = true;
    			}
    			if($line[0] != 'id')
    			{
    				$error = true;
    			}

    			if($line[1] != 'first_name')
    			{
    				$error = true;
    			}

    			if($line[2] != 'last_name')
    			{
    				$error = true;
    			}

    			if($line[3] != 'email')
    			{
    				$error = true;
    			}

    			if($line[4] != 'country')
    			{
    				$error = true;
    			}

    			if($error == true)
    			{
    				Session::flash('dangerMsg', 'CSV file has wrong structure. The header line must be: id, first_name, last_name, email, country');

    				return redirect(route('clients.clientsIndex'));
    			}
    		}
    		else
    		{
    			$newClient = new Client;
    			$newClient->first_name = $line['1'];
    			$newClient->last_name = $line['2'];
    			$newClient->email = $line['3'];
    			$newClient->country = $line['4'];
    			$newClient->save();
    		}
    		$i++;
      	}


      	Session::flash('successMsg', 'Done! Remember - only first 1000 records will save to db! :)');
    	return redirect(route('clients.clientsIndex'));
    }

    public function storeNewCsv(CsvUploadRequest $request)
    {
    	if($request->csv)
		{
			$newName = 'csv_'.date('m-d-Y_H-m-s');
	        $newFull = $newName.'.'.$request->csv->getClientOriginalExtension();
	        $file = $request->file('csv');
	        $file->storeAs('/', $newFull,['disk' => 'public_csv']);

	        Session::flash('successMsg', 'Done!');
		}
		else
		{
			Session::flash('dangerMsg', 'Ups... smth went wrong :(');
		}
    	
    	return redirect(route('clients.clientsIndex'));
    }
}
