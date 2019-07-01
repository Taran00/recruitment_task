<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\SingleNews;

class NewsController extends Controller
{
    public function newsIndex()
    {
    	return "news index";
    }

    public function newsAdd()
    {
    	return "news add";
    }

    public function newsEdit()
    {
    	return "news add";
    }

    public function newsStore(Request $request)
    {
    	return "news add";
    }

    public function newsUpdate(Request $request)
    {
    	return "news update";
    }
}
