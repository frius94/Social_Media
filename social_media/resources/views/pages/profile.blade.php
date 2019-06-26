@extends('layouts.app')
@section('content')
    <div class="row my-5">
        <div class="col-md-3">
            <!-- edit profile -->
        @if(auth()->user()->getAuthIdentifier() == $user->id)
            @include('inc.editProfile')
        @endif
        <!-- ./edit profile -->
        </div>
        <div class="col-md-6">
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
            @include('inc.createPost')
        @endif

        <!-- timeline -->

            <div>
                @include('inc.messages')
                @include('inc.posts')
            </div>
        </div>

        <!-- ./timeline -->

        <div class="col-md-3">

            <!-- friends -->
            <div class="card position-fixed">
                <div class="card-body">

                    @if(auth()->user()->getAuthIdentifier() == $user->id)

                        <div class="card">
                            @include('inc.friendRequest')
                        </div>


                    @endif

                    <h4>Friends</h4>
                    @include('inc.friendlist')
                </div>
            </div>
            <!-- ./friends -->
        </div>
    </div>
@endsection
