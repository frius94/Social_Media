<div class="card" id="editProfileCard">
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
                <label class="btn btn-outline-secondary">
                <input type="file" class="" name="picture" hidden>
                    <i class="fas fa-portrait fa-lg"></i>
                    Change profile picture
                </label>
            </div>

            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="update_profile" value="Save">
            </div>
        </form>
    </div>
</div>
