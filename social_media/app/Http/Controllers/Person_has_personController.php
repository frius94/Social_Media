<?php

namespace App\Http\Controllers;

use App\Person_has_person;
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

class Person_has_personController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Person Has Person Relation (FriendList) Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the Person has Person Relationship. This
    | Relation represents the Model for our FriendsList.
    |
    |
    */


    /**
     * Store a newly created resource in storage.
     *
     * @param $id ID of Target Friend Request
     * @return void
     */
	public function store($id)
	{

		/*
		 * Get all Relationships from Current LoggedIn User and Target.
		 * Because Current LoggedIn User can be person1 or person2 both cases need to be looked at.
		 */
	    $personHasPerson1 = Person_has_person::Where('person1', $id)->Where('person2', Auth::user()->getAuthIdentifier())->first();
        $personHasPerson2 = Person_has_person::Where('person2', $id)->Where('person1', Auth::user()->getAuthIdentifier())->first();


        // If no Data Entry has been found create a new one.
	    if(is_null($personHasPerson1) && is_null($personHasPerson2)) {

            $personHasPerson = new Person_has_person();
            $personHasPerson->person1 = auth()->user()->getAuthIdentifier();
            $personHasPerson->person2 = $id;
            $personHasPerson->friendAccepted = 0;
            $personHasPerson->save();

        } else if (is_null($personHasPerson2)) {
	        $this->acceptFriend($id, true);
        }
	    return redirect()->route('profile', ['id' => $id]);
	}


	/**
	 * Find Person to Person Relationship Model
	 *
	 * @param $id ID of Target Friend Request
	 * @return Person_has_person Relationship Model
	 */
	public function findPersonHasPerson($id)
    {

        $personHasPerson1 = Person_has_person::
            Where('person1', Auth::user()->getAuthIdentifier())->Where('person2', $id)->first();

        $personHasPerson2 = Person_has_person::
            Where('person1', $id)->Where('person2', Auth::user()->getAuthIdentifier())->first();


        if(!is_null($personHasPerson1)) {
            return $personHasPerson1;
        } else {
            return$personHasPerson2;
        }

    }

	/**
	 * Accept or Denie Friend Request
	 *
	 * @param $id ID of Target Friend Request
	 * @param $accept boolean accept or denie Friend Request
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function acceptFriend($id, $accept)
    {

        if($accept) {
            $personHasPerson = $this->findPersonHasPerson($id);
            $personHasPerson->friendAccepted = $accept;
            $personHasPerson->save();
        } else {
            $this->destroy($id, Auth::user()->getAuthIdentifier());
        }

        return redirect()->route('profile', ['id' => Auth::user()->getAuthIdentifier()]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $id1 Current LoggedIn User
     * @param $id2 Target User ID
     * @return \Illuminate\Http\Response
     */
	public function destroy($id1, $id2)
	{

	    Person_has_person::where('person1', $id1)->where('person2', $id2)->delete();
        Person_has_person::where('person2', $id1)->where('person1', $id2)->delete();

        return redirect()->route('profile', ['id' => Auth::user()->getAuthIdentifier()]);
	}


}
