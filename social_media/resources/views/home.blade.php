@extends('layouts.app')

@section('content')
    <div class="row my-5">
        <div class="col-lg-3 mb-5">
            <!-- edit profile -->
            <div class="card">
                <div class="card-body">

                    <img src="/storage/profile_pictures/{{$profilePicture}}" class="media-object" style="width: 100%;">
                    <h4 class="mt-3">{{Auth::user()->firstname .' '.Auth::user()->lastname}}</h4>

                </div>
            </div>
            <!-- ./edit profile -->
        </div>
        <div class="col-lg-6" id="homeFeedCol">

            <!-- timeline -->
            <div>
                @include('inc.posts')
            </div>
            <!-- ./timeline -->
        </div>
        <div class="col-lg-3" id="homeFriendListCol">
            <!-- friends -->
            <div class="card" id="friendListCard">
                <div class="card-body">
                    <h4>Friends</h4>
                    @include('inc.friendlist')
                </div>
            </div>
            <!-- ./friends -->
        </div>
    </div>
@endsection
