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

class LikePost extends Model
{
    protected $fillable = [
        'post_id', 'user_id',
    ];


    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
