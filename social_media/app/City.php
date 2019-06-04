<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

	protected $fillable = [
		'plz', 'name',
	];

    public function user() {
    	return $this->belongsTo('App\User');
    }

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
