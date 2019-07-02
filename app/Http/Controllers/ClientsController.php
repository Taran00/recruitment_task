<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientsController extends Controller
{
   public function clientsIndex()
   {
   		$all_clients = Client::all();

   		return view('clients.clients_index')->with('all_clients', $all_clients);
   }
}
