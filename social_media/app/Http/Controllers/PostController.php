<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

/**
 *
 * @author Umut Savas
 * @author Christopher O'Connor
 * @version 1.0
 * @since 2019/06/28
 *
 */

class PostController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Post Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the
    |
    */


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
	public function store(Request $request)
	{

	    $this->validate($request, [
	       'postText' => 'required'
        ]);

	    $post = new Post;
	    $post->text      = $request->input('postText');
	    $post->user_id   = Auth::user()->id;
	    $post->save();

	    $re = '/profile/' . Auth::user()->id;

	    return redirect($re)->with('success', 'Post created');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
        $re = '/profile/' . Auth::user()->id;
        $post = Post::find($id);

        if ($post->user_id == Auth::user()->id) {
            $post->delete();
            return redirect($re)->with('success', 'Post deleted');
        }
        return redirect($re)->with('error', 'Post does not belong to you.');
	}
}
