@if(count($posts) > 0)
    @for($i = 0; $i < count($posts); $i++)
        <!-- post -->
        <div class="card">
            <div class="card-body">
                <p>{{$posts[$i]->text}}</p>
            </div>
            <div class="card-footer">
                <span>posted {{$posts[$i]->created_at}} by {{$postUsers[$i][0]['firstname'] . ' ' . $postUsers[$i][0]['lastname']}}</span>
            </div>
        </div>
        <!-- ./post -->
    @endfor
@endif