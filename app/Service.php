<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	protected $primaryKey = 'id';
	protected $table = 'services';
	protected $fillable = array(
		'name',
		'type',
		"options",
		"about",
		"address",
		"location",
		'img_url'
	);
	public $timestamps = false;
}
