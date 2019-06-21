@if(count($posts) > 0)
    @for($i = 0; $i < count($posts); $i++)
        <!-- post -->
        <div class="card mb-3">
            <div class="card-body">
                <form action="/post/{{$posts[$i]->id}}/delete" method="post">
                    @csrf
                    <button type="submit" name="DEL" class="btn btn-danger btn-sm float-right">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
                <p>{{$posts[$i]->text}}</p>
            </div>
            <div class="card-footer">
                <span>posted {{$posts[$i]->created_at}} by {{$postUsers[$i][0]['firstname'] . ' ' . $postUsers[$i][0]['lastname']}}</span>
            </div>


            <!-- SHOW ALL COMMENTS -->


            <div class="container">
                <button class="btn btn-success mt-1 mb-1" type="button" data-toggle="collapse" data-target="{{'#collapse' . $posts[$i]->id}}" aria-expanded="false" aria-controls="collapseExample">
                    <span><i class="fas fa-comment-medical"></i> Add Comment</span>
                </button>
                <div class="collapse" id="{{'collapse' . $posts[$i]->id}}">
                    <div class="card mb-3">
                        <form action="{{action('CommentController@store')}}" method="POST">

                            <div class="card-body">
                                <p>Create Comment:</p>
                                <textarea class="form-control" type="text" name="text"></textarea>
                            </div>

                            <input name="URL"     type="hidden" value="{{url()->current()}}"/>
                            <input name="post_id" type="hidden" value="{{$posts[$i]->id}}"/>
                            <input name="_token"  type="hidden" value="{{ csrf_token() }}"/>

                            <div class="card-footer">
                                <input type="submit" value="Post" class="btn btn-primary" style="width: 8em"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
        <!-- ./post -->
    @endfor
@endif