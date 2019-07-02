<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    	dd($request->all());
    }
}
