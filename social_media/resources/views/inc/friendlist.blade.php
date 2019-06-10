@if(count($friends) > 0)
    @foreach($friends as $friend)
        <ul>
            <li>
                <a href="/profile/{{$friend->id}}">{{$friend->firstname . ' ' . $friend->lastname}}</a>
                <a class="text-danger"
                   href="/removeFriend/{{Auth::user()->id . '/' . $friend->id}}">[unfriend]</a>
            </li>
        </ul>
    @endforeach
@else
    <p>No friends available</p>
@endif