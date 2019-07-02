<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\SingleNews;
use Session;

//requestes
use App\Http\Requests\StoreNewNewsRequest;


class NewsController extends Controller
{
    public function allNewsIndex()
    {
        $all_news = SingleNews::where('is_active', 1)->get();
        return view('news.all_news_index')->with('all_news', $all_news);
    }

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
    	
        Session::flash('successMsg', 'News added!!');
    	return redirect(route('news.newsIndex'));
    }

    public function newsUpdate(StoreNewNewsRequest $request)
    {
    	$user = Auth::user();
    	$news = SingleNews::where('user_id', $user->id)->where('id', $request->news_id)->first();

    	if(empty($news))
    	{
            Session::flash('dangerMsg', 'There is no news like this!!');
    		return redirect(route('news.newsIndex'));
    	}

    	$news->name = $request->name;
    	$news->description = $request->description;
    	$news->is_active = $request->is_active;
    	$news->save();

        Session::flash('successMsg', 'News updated!!');
    	return redirect(route('news.newsIndex'));
    }

    public function newsDelete($id)
    {
    	$user = Auth::user();
    	$news = SingleNews::where('user_id', $user->id)->where('id', $id)->first();

    	if(empty($news))
    	{
            Session::flash('dangerMsg', 'There is no news like this!!');
    		return redirect(route('news.newsIndex'));
    	}

    	$news->delete();

        Session::flash('successMsg', 'News deleted!!');
    	return redirect(route('news.newsIndex'));
    }
}
