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
    protected $fillable = [
        'text', 'user_id',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
