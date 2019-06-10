@if(count($contributions) > 0)
    @for($i = 0; $i < count($contributions); $i++)
        <!-- post -->
        <div class="card">
            <div class="card-body">
                <p>{{$contributions[$i]->text}}</p>
            </div>
            <div class="card-footer">
                <span>posted {{$contributions[$i]->created_at}} by {{$contributionUsers[$i][0]['firstname'] . ' ' . $contributionUsers[$i][0]['lastname']}}</span>
            </div>
        </div>
        <!-- ./post -->
    @endfor
@endif