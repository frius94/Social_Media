<?php

namespace App\Http\Controllers;

use App\Contribution;
use App\User;
use Illuminate\Http\Request;
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
        //Get all contributions from friends of logged in user.
        $contributions = Contribution::whereIn('people_id', function ($query) {
            $query->select('person2')->from('person_has_people')->where('person1', Auth::user()->id);
        })->get();

        //Get the name of the author of the contribution and put it into array
        $contributionUsers = [];
        foreach ($contributions as $contribution) {
            $contributionUsers[] = User::select('firstname', 'lastname')->where('id', $contribution->people_id)->get();
        }

        return view('home')
            ->with('contributions', $contributions)
            ->with('contributionUsers', $contributionUsers);
    }
}
