<div class="card mb-3">
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