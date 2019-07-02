<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Storage;

class ClientsController extends Controller
{
   public function clientsIndex()
   {
   		$all_clients = Client::all();

   		$array_of_files = Storage::disk('public_csv')->files();

   		return view('clients.clients_index')->with('all_clients', $all_clients)->with('array_of_files', $array_of_files);
   }
}
