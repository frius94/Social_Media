<?php

namespace App\Http\Controllers;

use App\Person_has_person;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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
        $friends = [];
        $friendsID = Person_has_person::select('person2')->where('person1', Auth::user()->id)->get();
        foreach ($friendsID as $friendID)
            $friends[] = User::find($friendID->person2);

        return view('home')->with('friends', $friends);
    }
}
