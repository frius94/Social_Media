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

	/*
	|--------------------------------------------------------------------------
	| SchoolClass Model
	|--------------------------------------------------------------------------
	|
	| This Model contains all Data representing a SchoolClass.
	|
	|
	*/

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'classname',
	];

	/**
	 * Create RelationShip to App\User Model
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user() {
		return $this->belongsTo('App\User');
	}

	/**
	 * If Class already Exists, Create RelationShip to new Registered User.
	 * Else create First the Class and then Bind it.
	 *
	 * @param $classname
	 * @return App\SchoolClass
	 */
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
