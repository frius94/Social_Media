<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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
        //Get all contributions from friends of logged in user.
        $posts = Post::whereIn('people_id', function ($query) {
            $query->select('person2')->from('person_has_people')->where('person1', Auth::user()->id);
        })->get();

        //Get the name of the author of the contribution and put it into array
        $postUsers = [];
        foreach ($posts as $post) {
            $postUsers[] = User::select('firstname', 'lastname')->where('id', $post->people_id)->get();
        }

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

        return view('home')
            ->with('posts', $posts)
            ->with('postUsers', $postUsers)
            ->with('profilePicture', Auth::user()->profile_picture)
            ->with('searchResult', $searchResult);
    }
}
