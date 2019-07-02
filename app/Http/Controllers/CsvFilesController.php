<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

//requests
use App\Http\Requests\CsvUploadRequest;

class CsvFilesController extends Controller
{
    public function csvToDb($file_name)
    {
    	return $file_name;
    }

    public function storeNewCsv(CsvUploadRequest $request)
    {
    	if($request->csv)
		{
			$newName = 'csv_'.date('m-d-Y_H-m-s');
	        $newFull = $newName.'.'.$request->csv->getClientOriginalExtension();
	        $file = $request->file('csv');
	        $file->storeAs('/', $newFull,['disk' => 'public_csv']);
		}
    	
    	return redirect(route('clients.clientsIndex'));
    }
}
