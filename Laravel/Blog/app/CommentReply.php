<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    
	protected $fillable = [

		'comment_id',
		'is_active',
		'author',
		'email',
		'body'
	
	];

	/**
	 * Relationship with comments table
	 * @return [type] [description]
	 */
	public function comments() {

		return $this->belongsTo('App\Comment');

	}

	public function authors() {

		return $this->belongsTo('App\User', 'author');

	}

}
