<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SingleNews;

class PagesController extends Controller
{
   	public function index()
   	{
   		$all_news = SingleNews::where('is_active', 1)->get();
   		return view('pages.index')->with('all_news', $all_news);
   	}
}
