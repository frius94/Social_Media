<?php

namespace App\Http\View\Composers;

use App\User;
use App\Person_has_person;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FriendListComposer
{
    /**
     * Bind friend names to the view.
     *
     * @param View $view
     * @return void
     */
    function compose(View $view)
    {
        $friends = [];
        $friendsID = Person_has_person::select('person2')->where('person1', Auth::user()->id)->get();
        $ids = [];

        foreach ($friendsID as $friendID) {
            $friends[] = User::find($friendID->person2);
            $ids[] = User::find($friendID->person2)->id;
        }

        $view
            ->with('friends', $friends)
            ->with('friendsID', $ids);
    }
}