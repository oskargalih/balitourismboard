<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
	protected $primaryKey = 'id';
	protected $table = 'trips';
	protected $fillable = array(
		'city_id',
		'name',
		'tags',
		'description',
		'stories',
		'img_url'
	);
	public $timestamps = false;

	public function city()
	{
		return $this->belongsTo('App\City', 'city_id');
	}
}
