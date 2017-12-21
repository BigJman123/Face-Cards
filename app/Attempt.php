<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attempt extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function card()
    {
    	return $this->belongsTo(Cards::class);
    }
}
