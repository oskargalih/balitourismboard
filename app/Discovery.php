<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discovery extends Model
{
	protected $primaryKey = 'id';
	protected $table = 'discoveries';
	protected $fillable = array(
		'city_id',
		'name',
		'tags',
		'description',
		'photos',
		'img_url'
	);
	public $timestamps = false;

	public function city()
	{
		return $this->belongsTo('App\City', 'city_id');
	}
}
