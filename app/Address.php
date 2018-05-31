<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $primaryKey = 'address_id';

	public static $addRule=[ 
		'street' => 'required',
		'apt_no' =>'required',
		'city' => 'required',
		'state' =>'required',
		];

}
