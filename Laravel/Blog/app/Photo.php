<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    
	protected $fillable = ['file'];
	
	public $directory = '/images/';
	
	public function imageable() {

		return $this->morphTo();

	}

	public function getFilePathAttribute() {
		
		if($this->imageable)
			return '/' . $this->imageable->directory . $this->file;

		return $this->directory . $this->file;

	}
}
