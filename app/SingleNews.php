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
}
