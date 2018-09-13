<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    /**
     * Setting the columns for mass assignment
     * @var [type]
     */
	protected $fillable = ['id', 'title', 'content', 'user_id', 'category_id'];

	/**
	 * Images directory
	 * @var string
	 */
	public $directory = 'images/posts/';

	/**
	 * Relationship with photos table
	 * @return [type] [description]
	 */
	public function photos() {

		return $this->morphOne('App\Photo', 'imageable');

	}

	/**
	 * Relationship with users table
	 * @return [type] [description]
	 */
	public function author() {

		return $this->belongsTo('App\User', 'user_id');

	}

	/**
	 * Relationship with categories table
	 * @return [type] [description]
	 */
	public function category() {

		return $this->belongsTo('App\Category');

	}

	/**
	 * Relationship with comments table
	 * @return [type] [description]
	 */
	public function comments() {

		return $this->hasMany('App\Comment');

	}

	/**
	 * Override the delete function
	 * @return [type] [description]
	 */
	public function delete() {

		// Deleting the related photo
		$this->photos()->delete();

		// Delete the post
		parent::delete();
	}


}
