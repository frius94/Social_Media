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

class Post extends Model
{

	/*
	|--------------------------------------------------------------------------
	| Post Model
	|--------------------------------------------------------------------------
	|
	| This Model contains all Data representing a Post.
	|
	|
	*/

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
        'text', 'user_id',
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
	 * Create RelationShip to App\Comment Model
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
