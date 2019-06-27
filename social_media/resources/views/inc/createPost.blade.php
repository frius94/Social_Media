<button type="button" data-toggle="collapse" data-target="#collapseCreatePost" aria-expanded="false" class="btn btn-primary mb-2 btn-block">
    <i class="fas fa-pen fa-lg"></i>
    Create Post
</button>
<div class="card mb-3 collapse" id="collapseCreatePost">
    <form action="{{action('PostController@store')}}" method="POST">

        <div class="card-body">
            <textarea class="form-control" type="text" name="postText"></textarea>
        </div>

        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

        <div class="card-footer">
            <input type="submit" value="Post" class="btn btn-primary" style="width: 8em"/>
        </div>
    </form>
</div>
