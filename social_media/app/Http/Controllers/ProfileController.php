<?php

namespace App\Http\Controllers;

use App\Comment;
use App\LikePost;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //Get all posts from logged in user.
        $posts = Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();


        $user = User::find($id);

        //Get the name of the author of the post and put it into array
        $postUsers = [];

        foreach ($posts as $post) {
            $postUsers[] = User::select('firstname', 'lastname')->where('id', $post->user_id)->get();
        }

        //Search for user in search bar
        $searchQuery = Input::get('search');
        $searchResult = '';
        if ($searchQuery != null) {
            $searchResult = DB::table('Users')->select('id')->whereRaw(DB::raw("concat(firstname, ' ', lastname) LIKE '%$searchQuery%'"))->get();

            if (empty($searchResult->toArray())) {
                $searchResult = "No person found";
            } else {
                return redirect()->route('profile', ['id' => $searchResult[0]->id]);
            }
        }

        //Count likes of posts
        $countLikes = [];
        foreach ($posts as $post) {
            $countLikes[] = LikePost::where('post_id', $post->id)->count();
        }

        return view('pages.profile')
            ->with('user', $user)
            ->with('posts', $posts)
            ->with('postUsers', $postUsers)
            ->with('searchResult', $searchResult)
            ->with('likes', $countLikes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'status' => 'max:50',
            'location' => 'max:50',
            'picture' => 'file|image|max:5120'
        ]);

        $user = User::find(auth()->user()->getAuthIdentifier());

        if (!empty($request->input('status')))
            $user->status = $request->input('status');

        if (!empty($request->input('location')))
            $user->location = $request->input('location');


        if ($request->hasFile('picture')) {
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('picture')->storeAs('public/profile_pictures', $fileNameToStore);

            $user->profile_picture = $fileNameToStore;
        }
        $user->save();

        return redirect()->route('profile', ['id' => $user->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
