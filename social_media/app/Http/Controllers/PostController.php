<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

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
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
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
        return redirect($re)->with('error', 'Post does not Belong to you.');
	}
}
