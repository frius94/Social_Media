@if(count($friendsID) > 0)
    @if(!in_array($user->id, $friendsID))
        <a href="{{action('Person_has_personController@store', ['id' => $user->id])}}">
            <i class="fas fa-user-plus"></i>
            Add to friends</a>
    @endif
@endif