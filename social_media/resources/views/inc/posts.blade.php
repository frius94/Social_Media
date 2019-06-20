@if(count($posts) > 0)
    @for($i = 0; $i < count($posts); $i++)
        <!-- post -->
        <div class="card mb-3">
            <div class="card-body">
                <form action="/post/{{$posts[$i]->id}}/delete" method="post">
                    @csrf
                    <input type="submit" name="DEL" value="DEL" class="btn btn-danger btn-sm float-right">
                </form>
                <p>{{$posts[$i]->text}}</p>
            </div>
            <div class="card-footer">
                <span>posted {{$posts[$i]->created_at}} by {{$postUsers[$i][0]['firstname'] . ' ' . $postUsers[$i][0]['lastname']}}</span>
            </div>
        </div>
        <!-- ./post -->
    @endfor
@endif