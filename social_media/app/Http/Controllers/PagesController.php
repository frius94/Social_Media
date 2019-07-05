<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 *
 * @author Umut Savas
 * @author Christopher O'Connor
 * @version 1.0
 * @since 2019/06/28
 *
 */

class PagesController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Pages Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the requirement of User Authentication to
    | view all Pages.
    |
    */

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
        return view('pages.index');
    }
}
