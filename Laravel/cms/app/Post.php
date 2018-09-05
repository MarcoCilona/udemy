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

    /**
     * Creating a query scope. Its a static function, the 'scope' word is a convention and has to be put always before the name we want to give to the function.
     To call this query you have to use only the function name without 'scope'. 
     ex.: Post::latest()
     * @return [type] [description]
     */
    public static function scopeLatest($query) {

        return $query->orderBy('title', 'asc')->get();

    }

}
