@extends('layouts.app')

@section('content')
    <div class="row my-5">
        <div class="col-md-3">
            <!-- edit profile -->
            <div class="card">
                <div class="card-body">
                    <h4>Edit profile</h4>
                    <form method="post" action="{{action('ProfileController@update')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control" type="text" name="status" placeholder="Status" value="">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="text" name="location" placeholder="Location" value="">
                        </div>

                        <div class="form-group">
                            <label>Change profile picture</label>
                            <input type="file" class="form-control-file" name="picture">
                        </div>

                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="update_profile" value="Save">
                        </div>
                    </form>
                </div>
            </div>
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
                </div>
            </div>
            <!-- user profile -->

            <hr>

            <!-- timeline -->
            <div>
                @include('inc.contributions')
            </div>
            <!-- ./timeline -->
        </div>
        <div class="col-md-3">
            <!-- friends -->
            <div class="card">
                <div class="card-body">
                    <h4>Friends</h4>
                    @include('inc.friendlist')
                </div>
            </div>
            <!-- ./friends -->
        </div>
    </div>
@endsection
