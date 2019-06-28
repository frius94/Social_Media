<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

/**
 *
 * @author Umut Savas
 * @author Christopher O'Connor
 * @version 1.0
 * @since 2019/06/28
 *
 */

class CommentController extends Controller
{

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
            'text' => 'required'
        ]);

        $comment = new Comment;

        $comment->text      = $request->input('text');
        $comment->post_id   = $request->input('post_id');
        $comment->user_id   = Auth::user()->id;

        $comment->save();

        return redirect($request->input('URL'))->with('success', 'Comment created');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  String  $URL
     * @return Redirect
     */

    public function destroy($id, $URL)
    {

        $comment = Comment::find($id);
        $URL = str_replace("!", "/", $URL);

        if ($comment->user_id == Auth::user()->id) {
            $comment->delete();
            return redirect($URL)->with('success', 'Comment deleted');
        }

        return redirect($URL)->with('error', 'Comment does not Belong to you.');


    }
}
