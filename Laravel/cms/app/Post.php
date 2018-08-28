<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
   	
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	protected $table = 'posts';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
		'title',
		'content'
	];

	public function photos() {

        return $this->morphMany('App\Photo', 'imageable');

    }

    public function tags() {

    	return $this->morphToMany('App\Tag', 'taggable');

    }

}
