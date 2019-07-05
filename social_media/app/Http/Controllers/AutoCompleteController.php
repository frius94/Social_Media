<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

/**
 *
 * @author Umut Savas
 * @author Christopher O'Connor
 * @version 1.0
 * @since 2019/06/28
 *
 */

class AutoCompleteController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | AutoComplete Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the
    |
    */


    /**
     * Search for person in db and return the matching people
     * @param Request $request
     * @return array
     */
    public function search(Request $request)
    {
        $search = $request->input('query');
        $people = User::select('firstname', 'lastname')
            ->where('firstname', 'LIKE', '%' . $search . '%')
            ->orWhere('lastname', 'LIKE', '%' . $search . '%')
            ->get();

        $people = json_decode($people, true);
        $result = [];
        foreach ($people as $person)
            $result[] = $person['firstname'] . ' ' . $person['lastname'];

        return $result;
    }
}
