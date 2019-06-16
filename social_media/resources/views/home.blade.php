@extends('layouts.app')

@section('content')
    <div class="row my-5">
        <div class="col-md-3">
            <!-- edit profile -->
            <div class="card">
                <div class="card-body">

                    <img src="/storage/profile_pictures/{{$profilePicture}}" class="media-object" style="width: 100%;">
                    <h4 class="mt-3">{{Auth::user()->firstname .' '.Auth::user()->lastname}}</h4>

                </div>
            </div>
            <!-- ./edit profile -->
        </div>
        <div class="col-md-6">

            <!-- timeline -->
            <div>
                @include('inc.posts')
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
