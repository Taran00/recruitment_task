<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\SingleNews;

//requestes
use App\Http\Requests\StoreNewNewsRequest;


class NewsController extends Controller
{
    public function newsIndex()
    {
    	$user = Auth::user();
    	$user_news = SingleNews::where('user_id', $user->id)->get();
    	
    	return view('news.index')->with('user_news', $user_news);
    }

    public function newsAdd()
    {
    	return view('news.add');
    }

    public function newsEdit($id)
    {
    	$user = Auth::user();
    	$single_user_news = SingleNews::where('user_id', $user->id)->where('id', $id)->first();

    	if(empty($single_user_news))
    	{
    		return redirect('news.newsIndex');
    	}

    	return view('news.edit')->with('single_user_news', $single_user_news);
    }

    public function newsStore(StoreNewNewsRequest $request)
    {
    	$user = Auth::user();
    	$news = new SingleNews;
    	$news->name = $request->name;
    	$news->description = $request->description;
    	$news->is_active = $request->is_active;
		$news->user_id = $user->id;
		$news->save();
    	//todo -> message in session
    	return redirect(route('news.newsIndex'));
    }

    public function newsUpdate(StoreNewNewsRequest $request)
    {
    	$user = Auth::user();
    	$news = SingleNews::where('user_id', $user->id)->where('id', $request->news_id)->first();

    	if(empty($news))
    	{
    		return redirect(route('news.newsIndex'));
    	}

    	$news->name = $request->name;
    	$news->description = $request->description;
    	$news->is_active = $request->is_active;
    	$news->save();

    	return redirect(route('news.newsIndex'));
    }
}
