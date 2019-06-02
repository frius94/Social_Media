@extends('layouts.app')

@section('content')
    <h1 class="text-center my-5">{{$title}}</h1>

    <div class="row">
        <div class="col-md-6">
            <h4>{{$login}}</h4>

            <!-- login form -->
            <form method="post" action="">
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email">
                </div>

                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>

                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="login" value="Login">
                </div>
            </form>
            <!-- ./login form -->
        </div>
        <div class="col-md-6">
            <h4>{{$register}}</h4>

            <!-- register form -->
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <input class="form-control" type="text" name="firstname" placeholder="Firstname" required>
                </div>

                <div class="form-group">
                    <input class="form-control" type="text" name="lastname" placeholder="Lastname" required>
                </div>

                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>

                <div class="form-group">
                    <label for="profilePicture">Profile Picture</label>
                    <input class="form-control-file" type="file" name="profilePicture" id="profilePicture" required>
                </div>

                <div class="form-group">
                    <input class="btn btn-success" type="submit" name="register" value="Register">
                </div>
            </form>
            <!-- ./register form -->
        </div>
    </div>
@endsection