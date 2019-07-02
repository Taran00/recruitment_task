<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Storage;
use Session;

class ClientsController extends Controller
{
   public function clientsIndex()
   {
   		$all_clients = Client::all();

   		$array_of_files = Storage::disk('public_csv')->files();

   		return view('clients.clients_index')->with('all_clients', $all_clients)->with('array_of_files', $array_of_files);
   }

   public function chartIndex()
   {
      $all_clients = Client::all();
      if($all_clients->isEmpty())
      {
         Session::flash('dangerMsg', 'First create Client database!');
         return redirect(route('clients.clientsIndex'));
      }

      return view('clients.clients_chart_index');
   }

   public function turncateDb()
   {
   		Client::truncate();
         Session::flash('successMsg', 'Done!');
   		return redirect(route('clients.clientsIndex'));
   }
}
