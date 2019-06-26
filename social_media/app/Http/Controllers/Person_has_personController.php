<?php

namespace App\Http\Controllers;

use App\Person_has_person;
use Illuminate\Http\Request;

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
	    $personHasPerson = new Person_has_person();
	    $personHasPerson->person1 = auth()->user()->getAuthIdentifier();
	    $personHasPerson->person2 = $id;
	    $personHasPerson->friendAccepted = 0;
	    $personHasPerson->save();
	    return redirect()->route('profile', ['id' => $id]);
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
        return redirect()->route('profile', ['id' => $id2]);
	}
}
