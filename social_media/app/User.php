<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 *
 * @author Umut Savas
 * @author Christopher O'Connor
 * @version 1.0
 * @since 2019/06/28
 *
 */

class User extends Authenticatable implements MustVerifyEmail
{

	/*
	|--------------------------------------------------------------------------
	| User Model
	|--------------------------------------------------------------------------
	|
	| This Model contains all Data representing a User.
	|
	|
	*/


	use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'password', 'email', 'birthDate', 'street', 'mobile', 'cities_id', 'schoolClasses_id', 'profile_picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

	/**
	 * Create RelationShip to App\City Model
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
    public function city() {
    	return $this->hasOne('App\City');
    }

	/**
	 * Create RelationShip to App\SchoolClass Model
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
    public function schoolClass() {
    	return $this->hasOne('App\SchoolClass');
    }

	/**
	 * Create RelationShip to App\Post Model
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function posts() {
        return $this->hasMany('App\Post');
    }

	/**
	 * Create RelationShip to App\Comment Model
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function comments() {
        return $this->hasMany('App\Comment');
    }

}
