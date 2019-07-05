@if(!in_array($user->id, $friendsID) && ($user->id != auth()->user()->getAuthIdentifier()))
    <a href="{{action('Person_has_personController@store', ['id' => $user->id])}}">
        <i class="fas fa-user-plus"></i>
        Add to friends</a>
@endif