<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
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

    public function index()
    {
        $data = [
            'title' => 'Welcome to TBZ-SM',
            'about' => 'About',
            'login' => 'Login to start communicating with other students',
            'register' => 'Don\'t have an account yet? Register!',
            'credits' => 'Ⓒ TBZ-SM by Chris O\'Connor & Umut Savas',
            'index' => url()->current(),
        ];
        return view('pages.index', with($data));
    }


    public function profile($id)
    {

    	$user = User::find($id);

        return view('pages.profile')->with('user', $user);
    }

}
