<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'photo_id', 'is_active'
    ];

    public $directory = 'images/users/';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {

        return $this->belongsTo('App\Role');        

    }

    public function photos() {

        return $this->morphOne('App\Photo', 'imageable');

    }

    public function posts() {

        return $this->hasMany('App\Post');

    }

	public function isAdmin() {
		
		if($this->role->name == 'Admin')			
			return true;		
		
		return false;
		
	}

    // public function getFileAttribute() {

    //     return '/' . $this->directory . $this->photos->file;

    // }

}
