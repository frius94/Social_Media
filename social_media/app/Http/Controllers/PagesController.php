<?php

namespace App\Http\Controllers;

use App\Contribution;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('pages.index');
    }
}
