<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	protected $primaryKey = 'id';
	protected $table = 'cities';
	protected $fillable = array(
		'name',
		'title',
		'description',
		'img_url'
	);
	public $timestamps = false;
}
