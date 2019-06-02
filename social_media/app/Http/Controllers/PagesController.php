<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
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

    public function profile()
    {
        $data = [
        ];
        return view('pages.profile', with($data));
    }

    public function feed()
    {
        $data = [
        ];
        return view('pages.feed', with($data));
    }
}
