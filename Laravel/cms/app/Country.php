<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    
	public function posts() {

		/**
		 * It uses two table: the interested table and the intermediate one
		 */
		return $this->hasManyThrough('App\Post', 'App\User')->select('content');

	}

}
