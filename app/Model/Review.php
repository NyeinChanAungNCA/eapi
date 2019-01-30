<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    public function product()
    {
    	return $this->belongsTo('App\Model\Product');
    }
}
