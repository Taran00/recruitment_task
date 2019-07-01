<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SingleNews extends Model
{
    protected $table = 'news';

   	public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shortDescription()
    {
    	return mb_strimwidth($this->description, 0, 40, ' (...) ');
    }

    public function shortName()
    {
    	return mb_strimwidth($this->name, 0, 30, ' (...) ');
    }

    public function getEditLink()
    {
    	$route = route('news.newsEdit', ['id' => $this->id]);
    	return $route;
    }

    public function getDeleteLink()
    {
    	$route = route('news.newsDelete', ['id' => $this->id]);
    	return $route;
    }
}
