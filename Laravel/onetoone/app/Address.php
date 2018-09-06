<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * Setting fillable columns for mass assignment
     */
    protected $fillable = [
    	'name'
    ];

}
