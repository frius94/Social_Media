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

    /*
    |--------------------------------------------------------------------------
    | FriendList Composer
    |--------------------------------------------------------------------------
    |
    | This Composer handles the FriendList and open FriendRequests.
    |
    |
    */


    /**
     * Bind friendsList to the view of current LoggedIn User.
     *
     * @param View $view
     * @return void
     */
    function compose(View $view)
    {
        $friends = [];
        $friendRequests = [];

	    /*
		 * Get all Relationships from Current LoggedIn User and Target.
		 * Because Current LoggedIn User can be person1 or person2 both cases need to be looked at.
		 */
	    $friendsID1 = Person_has_person::select('person1')->where('person2', Auth::user()->id)->where('friendAccepted', true)->get();
        $friendsID2 = Person_has_person::select('person2')->where('person1', Auth::user()->id)->where('friendAccepted', true)->get();

	    /*
		 * Get all FriendRequests from Current LoggedIn User and Target.
		 */
	    $friendRequestID1 = Person_has_person::select('person1')->where('person2', Auth::user()->id)->where('friendAccepted', false)->get();



        $ids = [];

        /*
         * Create List of All Friends
         */
	    foreach ($friendsID1 as $friendID) {
		    $friends[] = User::find($friendID->person1);
		    $ids[]     = User::find($friendID->person1)->id;
	    }

        foreach ($friendsID2 as $friendID) {
            $friends[] = User::find($friendID->person2);
            $ids[]     = User::find($friendID->person2)->id;
        }


        /*
         * Create List of All open FriendRequests
         */
	    foreach ($friendRequestID1 as $friendID) {
		    $friendRequests[] = User::find($friendID->person1);
	    }
	    

        $view
            ->with('friends', $friends)
            ->with('friendsID', $ids)
            ->with('friendRequests', $friendRequests);

    }
}