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

class Comment extends Model
{

	/*
	|--------------------------------------------------------------------------
	| Comment Model
	|--------------------------------------------------------------------------
	|
	| This Model contains all Data representing a Comment.
	|
	|
	*/

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
        'post_id', 'user_id', 'text',
    ];


	/**
	 * Create RelationShip to App\Post Model
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function post() {
        return $this->belongsTo('App\Post');
    }

	/**
	 * Create RelationShip to App\User Model
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function user() {
        return $this->belongsTo('App\User');
    }

}
