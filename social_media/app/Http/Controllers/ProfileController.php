<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
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
        //Get all contributions from logged in user.
        $posts = Post::where('people_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        $user = User::find($id);

        //Get the name of the author of the contribution and put it into array
        $postUsers = [];
        foreach ($posts as $post) {
            $postUsers[] = User::select('firstname', 'lastname')->where('id', $post->people_id)->get();
        }

        return view('pages.profile')
            ->with('user', $user)
            ->with('posts', $posts)
            ->with('postUsers', $postUsers);
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

        return redirect()->route('profile', ['id' => 1]);
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
