<?php

namespace App\Http\Controllers;

use App\LikePost;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Get all posts from friends of logged in user.
        $posts = Post::whereIn('user_id', function ($query) {
            $query->select('person2')->from('person_has_people')->where('person1', Auth::user()->id)->orWhere('person2', Auth::user()->id);
        })->orderBy('created_at', 'desc')->get();

        //Get the name of the author of the post and put it into array
        $postUsers = [];
        foreach ($posts as $post) {
            $postUsers[] = User::select('firstname', 'lastname')->where('id', $post->user_id)->get();
        }

        //Search for user in search bar
        $searchQuery = Input::get('search');
        $response = '';
        $searchResult = '';
        if ($searchQuery != null) {
            $searchResult = DB::table('Users')
                ->select('id', 'firstname', 'lastname', 'profile_picture', 'birthDate', 'cities_id', 'schoolClasses_id', 'email')
                ->whereRaw(DB::raw("concat(firstname, ' ', lastname) LIKE '%$searchQuery%'"))->get();
            if (empty($searchResult->toArray())) {
                $response = "No person found";
            } elseif(count($searchResult) === 1){
                return redirect()->route('profile', ['id' => $searchResult[0]->id]);
            } else {
                return view('pages.search', ['searchResult' => $searchResult]);
            }
        }

        //Count likes of posts
        $countLikes = [];
        foreach ($posts as $post) {
            $countLikes[] = LikePost::where('post_id', $post->id)->count();
        }

        return view('home')
            ->with('posts', $posts)
            ->with('postUsers', $postUsers)
            ->with('profilePicture', Auth::user()->profile_picture)
            ->with('response', $response)
            ->with('user', Auth::user())
            ->with('likes', $countLikes);
    }
}
