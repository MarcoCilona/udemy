<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function post(){
        /**
         * The first parameter passed is the name of the related model. Once the relationship is defined we may retrieve the related record using Eloquent's dynamic properties. Eloquent determines the foreign key of the relationship.
         */
        return $this->hasOne('App\Post');

    }

    public function posts() {

        return $this->hasMany('App\Post');
    }

    public function roles() {

        return $this->belongsToMany('App\Role');

    }

    public function photos() {

        return $this->morphMany('App\Photo', 'imageable');

    }

    /**
     * Modify the value returned.
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function getNameAttribute($value) {

        return strtoupper($value);

    }

    /**
     * Manipulate data before they get saved on the DB.
     * @param [type] $value [description]
     */
    public function setNameAttribute($value){

        $this->attributes['name'] = strtoupper($value);

    }
}
