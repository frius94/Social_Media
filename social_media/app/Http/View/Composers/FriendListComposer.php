<?php

namespace App\Http\View\Composers;

use App\User;
use App\Person_has_person;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 *
 * @author Umut Savas
 * @author Christopher O'Connor
 * @version 1.0
 * @since 2019/06/28
 *
 */

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
        $friendRequests = [];

	    $friendsID1 = Person_has_person::select('person1')->where('person2', Auth::user()->id)->where('friendAccepted', true)->get();
        $friendsID2 = Person_has_person::select('person2')->where('person1', Auth::user()->id)->where('friendAccepted', true)->get();

	    $friendRequestID1 = Person_has_person::select('person1')->where('person2', Auth::user()->id)->where('friendAccepted', false)->get();
	    $friendRequestID2 = Person_has_person::select('person2')->where('person1', Auth::user()->id)->where('friendAccepted', false)->get();



        $ids = [];

	    foreach ($friendsID1 as $friendID) {
		    $friends[] = User::find($friendID->person1);
		    $ids[]     = User::find($friendID->person1)->id;
	    }

        foreach ($friendsID2 as $friendID) {
            $friends[] = User::find($friendID->person2);
            $ids[]     = User::find($friendID->person2)->id;
        }


	    foreach ($friendRequestID1 as $friendID) {
		    $friendRequests[] = User::find($friendID->person1);
	    }
	    foreach ($friendRequestID2 as $friendID) {
		    $friendRequests[] = User::find($friendID->person2);
	    }


        $view
            ->with('friends', $friends)
            ->with('friendsID', $ids)
            ->with('friendRequests', $friendRequests);

    }
}