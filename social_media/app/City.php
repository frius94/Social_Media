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

class City extends Model
{

	/*
	|--------------------------------------------------------------------------
	| City Model
	|--------------------------------------------------------------------------
	|
	| This Model contains all Data representing a City.
	|
	|
	*/

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'plz', 'name',
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
	 * If City already Exists, Create RelationShip to new Registered User.
	 * Else create First the City and then Bind it.
	 *
	 * @param array $data
	 * @return City
	 */
    public static function registerUser(array $data) {

	    $city = City::where([['plz', $data['plz']], ['name', $data['city']]])->get();

	    if(count($city) > 0) {
	    	return $city[0];
	    }

		return City::create([
			'plz' => $data['plz'],
			'name' => $data['city'],
		]);


    }
}
