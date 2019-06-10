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
                @include('inc.contributions')
            </div>
            <!-- ./timeline -->
        </div>
        <div class="col-md-3">
            <!-- friends -->
            <div class="card">
                <div class="card-body">
                    <h4>Friends</h4>
                    <ul>
                        <li>
                            <a href="#">peterpan</a>
                            <a class="text-danger" href="#">[unfriend]</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ./friends -->
        </div>
    </div>
@endsection
