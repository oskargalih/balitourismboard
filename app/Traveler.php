<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Traveler extends Model
{
	protected $primaryKey = 'id';
	protected $table = 'travelers';
	protected $fillable = array(
		'name',
		'status',
		'img_url'
	);
	public $timestamps = false;
}
