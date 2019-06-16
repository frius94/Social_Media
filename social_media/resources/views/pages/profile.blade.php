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

            <div class="card mb-3">
                @include('inc.messages')
                <form action="{{action('PostController@store')}}" method="POST">

                    <div class="card-body">
                        <p>Create New Post:</p>
                        <textarea class="form-control" type="text" name="postText"></textarea>
                    </div>

                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

                    <div class="card-footer">
                        <input type="submit" value="Post" class="btn btn-primary" style="width: 8em"/>
                    </div>
                </form>
            </div>

            <!-- timeline -->
            <div>
                @include('inc.posts')
            </div>
            <!-- ./timeline -->
        </div>
        <div class="col-md-3">
            <!-- friends -->
            <div class="card position-fixed">
                <div class="card-body">
                    <h4>Friends</h4>
                    @include('inc.friendlist')
                </div>
            </div>
            <!-- ./friends -->
        </div>
    </div>
@endsection
