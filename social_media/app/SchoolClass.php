<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * @author Umut Savas
 * @author Christopher O'Connor
 * @version 1.0
 * @since 2019/06/28
 *
 */

class SchoolClass extends Model
{
	protected $fillable = [
		'classname',
	];

	public function user() {
		return $this->belongsTo('App\User');
	}

	public static function registerUser($classname) {

		$SchoolClass = SchoolClass::where('classname', $classname)->get();

		if(count($SchoolClass) > 0) {
			return $SchoolClass[0];
		}

		return SchoolClass::create([
			'classname' => $classname,
		]);

	}

}
