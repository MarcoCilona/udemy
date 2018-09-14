<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
	protected $fillable = [
	
		'post_id',
		'is_active',
		'author',
		'email',
		'body'

	];


	/**
	 * Relationship with comment_replies table
	 * @return [type] [description]
	 */
	public function replies() {

		return $this->hasMany('App\CommentReply');

	}

	/**
	 * Relationship with posts table
	 * @return [type] [description]
	 */
	public function post() {

		return $this->belongsTo('App\Post');

	}

	/**
	 * Relationship with users table
	 * @return [type] [description]
	 */
	public function authors() {

		return $this->belongsTo('App\User', 'author');

	}

	public function getStatusAttribute () {

		if($this->is_active == 1)
			return 'Active';

		return 'Inactive';

	}

}
