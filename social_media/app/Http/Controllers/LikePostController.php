<?php

namespace App\Http\Controllers;

use App\LikePost;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

/**
 *
 * @author Umut Savas
 * @author Christopher O'Connor
 * @version 1.0
 * @since 2019/06/28
 *
 */

class LikePostController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | LikePost Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the
    |
    */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function storeAndDelete(Request $request)
    {
        $input = $request->all();

        if (empty(LikePost::where('post_id', $input['id'])->where('user_id', Auth::user()->getAuthIdentifier())->first())) {
            $like = new LikePost;
            $like->post_id = $input['id'];
            $like->user_id = Auth::user()->getAuthIdentifier();
            $like->save();
        } else {
            $like = LikePost::where('post_id', $input['id'])->where('user_id', Auth::user()->getAuthIdentifier())->first();
            $like->delete();
        }
    }

}
