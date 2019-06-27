@extends('layouts.app')

@section('content')
    <div class="row my-5">
        <div class="col-lg-12" id="homeFeedCol">
            <!-- search results -->
                @include('inc.searchResults')
            <!-- ./search results -->
        </div>
    </div>
@endsection
