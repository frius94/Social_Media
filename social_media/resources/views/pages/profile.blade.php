@extends('layouts.app')
@section('content')
    <div class="row my-5">
        <div class="col-lg-3" id="editProfileCol">
            <!-- edit profile -->
        @if(auth()->user()->getAuthIdentifier() == $user->id)
            @include('inc.editProfile')
        @endif
        <!-- ./edit profile -->
        </div>
        <div class="col-lg-6" id="profileFeedCol">
            <!-- user profile -->
            <div class="media">
                <div class="media-left">
                    <img src="/storage/profile_pictures/{{$user->profile_picture}}" class="media-object"
                         style="width: 128px; height: auto;">
                </div>
                <div class="media-body ml-4">
                    <h2 class="media-heading">{{$user->firstname . ' ' . $user->lastname}}</h2>
                    <p>Status: {{$user->status}}</p>
                    <p>Location: {{$user->location}}</p>
                    @include('inc.addfriend')
                </div>
            </div>
            <!-- user profile -->

            <hr>
        @if(auth()->user()->getAuthIdentifier() == $user->id)
            @include('inc.friendRequest')
            @include('inc.createPost')
        @endif

        <!-- timeline -->

            <div>
                @include('inc.messages')
                @include('inc.posts')
            </div>

        <!-- ./timeline -->
        </div>
        <div class="col-lg-3 mb-5" id="profileFriendListCol">
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
