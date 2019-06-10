@extends('layouts.app')

@section('content')
    <div class="row my-5">
        <div class="col-md-3">
            <!-- edit profile -->
            <div class="card">
                <div class="card-body">

                    <img src="img/my_avatar.png" class="media-object" style="width: 100%;">
                    <h4 class="mt-3">{{Auth::user()->firstname .' '.Auth::user()->lastname}}</h4>

                </div>
            </div>
            <!-- ./edit profile -->
        </div>
        <div class="col-md-6">

            <!-- timeline -->
            <div>
                <!-- post -->
                <div class="card">
                    <div class="card-body">
                        <p>Hello people! This is my first FaceClone post. Hurray!!!</p>
                    </div>
                    <div class="card-footer">
                        <span>posted 2017-5-27 20:45:01 by nicholaskajoh</span>
                        <span class="pull-right"><a class="text-danger" href="#">[delete]</a></span>
                    </div>
                </div>
                <!-- ./post -->
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
