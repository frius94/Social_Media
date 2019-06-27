<?php

namespace App\Http\Controllers;

use App\Person_has_person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Person_has_personController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param $id
     * @return void
     */
	public function store($id)
	{

	    $personHasPerson1 = Person_has_person::Where('person1', $id)->Where('person2', Auth::user()->getAuthIdentifier())->first();


        $personHasPerson2 = Person_has_person::Where('person2', $id)->Where('person1', Auth::user()->getAuthIdentifier())->first();



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
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param $id1
     * @param $id2
     * @return \Illuminate\Http\Response
     */
	public function destroy($id1, $id2)
	{

	    Person_has_person::where('person1', $id1)->where('person2', $id2)->delete();
        Person_has_person::where('person2', $id1)->where('person1', $id2)->delete();

        return redirect()->route('profile', ['id' => Auth::user()->getAuthIdentifier()]);
	}


}
