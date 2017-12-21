<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
	public function attempts()
	{
		return $this->hasMany(Attempt::class);
	}
}
