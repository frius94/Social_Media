@if(count($posts) > 0)
    @for($i = 0; $i < count($posts); $i++)
        <!-- post -->
        <div class="card mb-4">
            <div class="card-body">
                <form action="/post/{{$posts[$i]->id}}/delete" method="post">
                    @csrf
                    @if(auth()->user()->getAuthIdentifier() == $posts[$i]->user_id)
                        <button type="submit" name="DEL" class="btn btn-danger float-right">
                            <i class="fas fa-trash-alt fa-lg"></i>
                        </button>
                    @endif
                </form>
                <p>{!! nl2br($posts[$i]->text, false) !!}</p>
            </div>
            <div class="card-footer">
                <span>posted {{$posts[$i]->created_at}} by {{$postUsers[$i][0]['firstname'] . ' ' . $postUsers[$i][0]['lastname']}}</span>
            </div>

            @if(!$posts[$i]->comments->isEmpty())
                <button class="btn btn-primary mb-2" type="button" data-toggle="collapse"
                        data-target="{{'#collapseComments' . $posts[$i]->id}}" aria-expanded="false">
                    <span><i class="fas fa-comments fa-lg"></i> Show all Comments</span>
                </button>
        @endif

        <!-- SHOW ALL COMMENTS -->
            <div class="mx-auto mt-2 collapse" id="{{'collapseComments' . $posts[$i]->id}}">

            @foreach(App\Post::find($posts[$i]->id)->comments as $comment)


                    <div class="card mb-3" style="max-width: 500px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="/storage/profile_pictures/{{ App\Comment::find($comment->id)->user->profile_picture }}"
                                     class="card-img" alt="ProfilePic" style="max-width: 150px; height: auto;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">

                                    @if(auth()->user()->getAuthIdentifier() == App\Comment::find($comment->id)->user->id)
                                        <form
                                            action="/comment/{{$comment->id}}/{{str_replace("/", "!", url()->current())}}/delete"
                                            method="post">
                                            @csrf

                                            <button type="submit" name="DEL" class="btn btn-danger btn-sm float-right">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>


                                        </form>
                                    @endif

                                    <p class="card-text">{!! nl2br($comment->text, false) !!}</p>
                                    <p class="card-text">
                                        <small class="text-muted">commented {{$comment->created_at}}
                                            by {{App\Comment::find($comment->id)->user->firstname . ' ' . App\Comment::find($comment->id)->user->lastname}}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex my-2">
                <button class="btn btn-success ml-4" type="button" data-toggle="collapse"
                        data-target="{{'#collapse' . $posts[$i]->id}}" aria-expanded="false">
                    <span><i class="fas fa-comment-medical fa-lg"></i> Add Comment</span>
                </button>
                <button class="btn btn-info ml-auto mr-4" id="like{{$posts[$i]->id}}"
                        onclick="likePost({{$posts[$i]->id}})"
                        @if($likes[$i] === 0)
                        data-toggle="tooltip" data-placement="top" title="Nobody likes this">
                    @elseif($likes[$i] === 1)
                        data-toggle="tooltip" data-placement="top" title="{{$likes[$i]}} Person likes this">
                    @else
                        data-toggle="tooltip" data-placement="top" title="{{$likes[$i]}} People like this">
                    @endif
                    <i class="far fa-thumbs-up fa-lg" id="thumbs{{$posts[$i]->id}}"></i>
                </button>
            </div>
            <div class="collapse" id="{{'collapse' . $posts[$i]->id}}">
                <div class="card mb-3">
                    <form action="{{action('CommentController@store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <p>Create Comment:</p>
                            <textarea class="form-control" type="text" name="text"></textarea>
                        </div>

                        <input name="URL" type="hidden" value="{{url()->current()}}"/>
                        <input name="post_id" type="hidden" value="{{$posts[$i]->id}}"/>
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

                        <div class="card-footer">
                            <input type="submit" value="Post" class="btn btn-primary" style="width: 8em"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ./post -->
    @endfor
@endif
